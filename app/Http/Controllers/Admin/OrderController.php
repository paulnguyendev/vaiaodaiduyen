<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Link\OrderLink;
use App\Helpers\Notify;
use App\Helpers\Obn;
use App\Helpers\Template\Count;
use App\Helpers\Template\Product;
use App\Helpers\User;
use App\Http\Controllers\Controller;
use App\Models\ComboModel;
use App\Models\OrderCourseUserModel;
use App\Models\ProductMetaModel;
#Request
#Model
use App\Models\OrderModel as MainModel;
use App\Models\TaxonomyModel;
use App\Models\UserModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
#Mail
use Illuminate\Support\Facades\Mail;
// use App\Mail\NewUserMail;
#Helper
class OrderController extends Controller
{
    private $pathViewController     = "admin.pages.order";
    private $controllerName         = "admin_order";
    private $model;
    private $taxonomyModel;
    private $productMetaModel;
    private $userModel;
    private $comboModel;
    private $orderCourseUserModel;
    private $params                 = [];
    function __construct()
    {
        $this->model = new MainModel();
        $this->taxonomyModel = new TaxonomyModel();
        $this->productMetaModel = new ProductMetaModel();
        $this->userModel = new UserModel();
        $this->comboModel = new ComboModel();
        $this->orderCourseUserModel = new OrderCourseUserModel();
        View::share('controllerName', $this->controllerName);
    }
    public function index(Request $request)
    {
        $orderNew = Count::countOrder('new');
        $orderConfirm = Count::countOrder('confirm');
        $orderShipping = Count::countOrder('shipping');
        $orderComplete = Count::countOrder('complete');
        return view(
            "{$this->pathViewController}/index",
            [
                'orderNew' => $orderNew,
                'orderConfirm' => $orderConfirm,
                'orderShipping' => $orderShipping,
                'orderComplete' => $orderComplete,
            ]
        );
    }
    public function dataList(Request $request)
    {
        $result = [];
        $params = $request->all();
        $search = isset($params['search']) ? $params['search'] : [];
        $status = isset($params['status']) ? $params['status'] : [];
        $searchValue = isset($search['value']) ? $search['value'] : "";
        $total = 0;
        // $items = [
        //     [
        //         "id" => "1",
        //         "code" => "#ORDER0001",
        //         "fullname" => "Duy Anh Ngọc",
        //         "phone" => "0778413788",
        //         "email" => "tinidev.com@gmail.com",
        //         "address" => "59/10 đường số 2, phường 3, Quận Gò Vấp",
        //         "note" => "",
        //         "payment_status" => "0",
        //         "coupon" => "null",
        //         "total" => "164500",
        //         "shipping_fee" => "100000",
        //         "currency" => "đ",
        //         "status" => "1",
        //         "payment_method" => "Thu tiền tận nơi - COD",
        //         "created_at" => "2022-12-27 16:49:16",
        //         "view_by_admin" => "1",
        //         "created_by" => "1",
        //         "details" => [
        //             [
        //                 "id" => "1",
        //                 "order_id" => "1",
        //                 "product_id" => "12",
        //                 "product_code" => "",
        //                 "product_name" => "Gầu bò Úc",
        //                 "product_option" => "[]",
        //                 "product_type" => "advanced",
        //                 "price" => "0",
        //                 "original_price" => "0",
        //                 "quantity" => "1",
        //                 "subtotal" => "0",
        //                 "product_parent_id" => ""
        //             ],
        //             [
        //                 "id" => "2",
        //                 "order_id" => "1",
        //                 "product_id" => "11",
        //                 "product_code" => "",
        //                 "product_name" => "Cá chim trắng biển tươi",
        //                 "product_option" => "[]",
        //                 "product_type" => "config",
        //                 "price" => "64500",
        //                 "original_price" => "64500",
        //                 "quantity" => "1",
        //                 "subtotal" => "64500",
        //                 "product_parent_id" => ""
        //             ]
        //         ]
        //     ]
        // ];
        if ($status) {
            $items = $this->model->listItems(['status' => $status], ['task' => 'status']);
        } else {
            $items = $this->model->listItems([], ['task' => 'list']);
        }
        $items = $items ? $items->toArray() : [];
        $items = array_map(function ($item) {
            $products = $item['products'] ? json_decode($item['products'], true)  : [];
            $products = array_map(function ($product) {
                $product['product_name'] = $product['name'];
                return $product;
            }, $products);
            $item['details'] = $products;
            $info_order = $item['info_order'] ? json_decode($item['info_order'], true)  : [];
            $item['fullname'] = $info_order['fullname'] ?? "-";
            $item['phone'] = $info_order['phone'] ?? "-";
            $item['address'] = $info_order['address'] ?? "-";
            $payment = $item['payment'] ? json_decode($item['payment'], true)  : [];
            $item['payment_method'] = $payment['method_title'] ?? "-";
            $item['payment_status'] = $payment['status'] ?? 0;
            $item['currency'] = "đ";
            return $item;
        }, $items);
        $test = null;
        $typeSearch = null;
        if ($searchValue) {
            $test = strpos("0932730394", $searchValue);
            $items = array_filter($items, function ($item) use ($searchValue) {
                if (strpos($item['phone'], $searchValue) !== FALSE) {
                    $item['typeSearch'] = "phone";
                    return $item;
                } elseif (strpos($item['code'], $searchValue) !== FALSE) {
                    $item['typeSearch'] = "code";
                    return $item;
                }
            });
        }
        $total = count($items);
        $result = [
            'draw' => 0,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $items,
            'searchValue' => $searchValue,
            'test' => $test,
        ];
        return $result;
    }
    public function destroyMulti(Request $request)
    {
        $result = [];
        $ids = $request->ids;
        if (count($ids) > 0) {
            foreach ($ids as $id) {
                $this->model->deleteItem(['id' => $id], ['task' => 'delete']);
            }
        }
        return $ids;
    }
    public function detail(Request $request)
    {
        $id = $request->id;
        $item = $this->model::find($id);
        $payment = json_decode($item['payment'], true) ?? [];
        $info_order = json_decode($item['info_order'], true) ?? [];
        $info_shipping = json_decode($item['info_shipping'], true) ?? [];
        $products = json_decode($item['products'], true) ?? [];
        $shipping = json_decode($item['shipping'], true) ?? [];
        $shippingFee = $shipping['fee'] ?? 0;
        $total = $item['total'] ?? 0;
        $discount = $item['discount'] ?? 0;
        $orderSum = Product::getOrderSumary($total, [
            'add' => [$shippingFee],
            'minus' => [$discount],
        ]);
        return view(
            "{$this->pathViewController}/detail",
            [
                'id' => $id,
                'item' => $item,
                'payment' => $payment,
                'products' => $products,
                'shipping' => $shipping,
                'orderSum' => $orderSum,
                'info_order' => $info_order,
                'info_shipping' => $info_shipping,
            ]
        );
    }
    public function save(Request $request)
    {
        $id = $request->id;
        $payment = [];
        $params = $request->all();
        $status = isset($params['status']) ? $params['status'] : "";
        $payment_status = isset($params['payment_status']) ? $params['payment_status'] : '';
        $shippingfee = isset($params['shippingfee']) ? $params['shippingfee'] : '';
        $discount = isset($params['discount']) ? $params['discount'] : '';
        if ($status) {
            $this->model->saveItem(['id' => $id, 'status' => $status], ['task' => 'edit-item']);
        }
        $item = $this->model::find($id);
        if ($payment_status != '') {
            $payment = json_decode($item['payment'], true) ?? [];
            $payment['status'] = $payment_status;
            $this->model->saveItem(['id' => $id, 'payment' => json_encode($payment)], ['task' => 'edit-item']);
        }
        if ($shippingfee != '') {
            $shipping = json_decode($item['shipping'], true) ?? [];
            $shipping['fee'] = $shippingfee;
            $this->model->saveItem(['id' => $id, 'shipping' => json_encode($shipping)], ['task' => 'edit-item']);
        }
        if ($discount != '') {
            $this->model->saveItem(['id' => $id, 'discount' => $discount], ['task' => 'edit-item']);
        }
        session()->flash('status_success', 'Cập nhật đơn hàng thành công');
        $result = [
            'title' => 'Thông báo',
            'message' => 'Cập nhật thành công',
            'success' => true,
            'redirect' => route('admin_order/detail', ['id' => $id]),
        ];
        return $result;
    }
    public function delete(Request $request)
    {
        $result = [];
        $id = $request->id;
        $this->model->deleteItem(['id' => $id], ['task' => 'delete']);
        return $id;
    }
    public function saveInfo(Request $request)
    {
        $id = $request->id;
        $params = $request->all();
        $type = $request->type;
        $paramsUpdate['id'] = $id;
        if ($type == 'order') {
            $paramsUpdate['info_order'] = json_encode($params);
        } else {
            $paramsUpdate['info_shipping'] = json_encode($params);
        }
        $this->model->saveItem($paramsUpdate, ['task' => 'edit-item']);
        return redirect(route('admin_order/detail', ['id' => $id]))->with('status_success', 'Cập nhật đơn hàng thành công');
    }
    public function activeCourse(Request $request)
    {
        $code = $request->code;
        $item = $this->model->getItem(['code' => $code], ['task' => 'code']);
        $products = [];
        $info_order = [];
        $randomPassword = Str::random(10);
        $emailExits  = 0;
        $is_affiliate = 0;
        $checkAffiliate = [];
        if ($item) {
            $id = $item['id'];
            $products = json_decode($item['products'], true);
            $comboPriceMin = 5000000;
            $checkAffiliate = array_filter($products, function ($item) use ($comboPriceMin) {
                if ($item['type'] == 'combo' && $item['price'] >= $comboPriceMin) {
                    return $item;
                }
            });
            $is_affiliate = count($checkAffiliate) > 0 ? 1 : 0;
            $info_order = json_decode($item['info_order'], true);
            $checkEmail = $this->userModel->getItem(['email' => $info_order['email']], ['task' => 'email']);
            if ($checkEmail) {
                $emailExits = 1;
            }
            $orderSum = 0;
            return view(
                "{$this->pathViewController}/activeCourse",
                [
                    'products' => $products,
                    'code' => $code,
                    'orderSum' => $orderSum,
                    'item' => $item,
                    'info_order' => $info_order,
                    'randomPassword' => $randomPassword,
                    'is_affiliate' => $is_affiliate,
                    'emailExits' => $emailExits,
                    'checkEmail' => $checkEmail,
                ]
            );
        } else {
            return redirect(route('admin_order/index'));
        }
    }
    public function saveActiveCourse(Request $request)
    {
        $params = $request->all();
        $active = $params['active'];
        $user_id = $params['user_id'] ?? "";
        $order_id = $params['order_id'] ?? "";
        $parent_id = $params['parent_id'] ?? "";
        $code = $params['code'] ?? "";
        $emailExits = $params['emailExits'] ?? 1;
        $is_affiliate = $params['is_affiliate'] ?? 0;
        $current_is_affiliate = $params['current_is_affiliate'] ?? "";
        $comboCourse = [];
        $course = [];
        $user = [];
        foreach ($active as $item) {
            $type = $item['type'];
            $id = $item['id'];
            if ($type == 'combo') {
                $combo = $this->comboModel::find($id);
                $comboCourse = $combo ? $combo->courseList()->get()->toArray() : [];
            } else {
                $course[] = $id;
            }
        }
        $courseActive = array_filter($comboCourse, function ($item) use ($course) {
            if (!in_array($item['id'], $course)) {
                return $item;
            }
        });
        #_Tạo tài khoản nếu chưa có
        if ($emailExits == 0) {
            $fullname = $params['fullname'] ?? "";
            $email = $params['email'] ?? "";
            $phone = $params['phone'] ?? "";
            $token = $params['_token'] ?? "";
            $code = config('obn.prefix.code') . Obn::generateUniqueCode();
            $randomPassword = Str::random(10);
            $user = [
                'password' => md5($randomPassword),
                'name' => $fullname,
                'phone' => $phone,
                'email' => $email,
                'username' => $email,
                'code' => $code,
                'token' => $token,
                'is_affiliate' => $is_affiliate,
                'parent_id' => $parent_id,
                'status' => 'active',
                'role' => 'user',
                'parent_id' => '',
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $createUser = $this->userModel->saveItem($user, ['task' => 'add-item']);
            $user_id = $createUser->id;
            try {
                Notify::sendMailCreateUser(['email' => $email,'name' => $fullname,'password' => $randomPassword]);
                Notify::sendMailCreateCourse(['email' => $email,'course' => $courseActive ]);
            } catch (\Throwable $th) {
                //throw $th;
            }
        } else {
            if ($current_is_affiliate == 0 && $is_affiliate == 1) {
                $this->userModel->saveItem(['is_affiliate' => $is_affiliate, 'id' => $user_id], ['task' => 'edit-item']);
            }
        }
        #_Active khóa học
        try {
            if (count($courseActive) > 0) {
                foreach ($courseActive as $item) {
                    $activeItem['order_id'] = $order_id;
                    $activeItem['course_id'] = $item['id'];
                    $activeItem['user_id'] = $user_id;
                    $this->orderCourseUserModel->saveItem($activeItem, ['task' => 'add-item']);
                }
            }
            if (count($course) > 0) {
                foreach ($course as $courseId) {
                    $activeItem['order_id'] = $order_id;
                    $activeItem['course_id'] = $courseId;
                    $activeItem['user_id'] = $user_id;
                    $this->orderCourseUserModel->saveItem($activeItem, ['task' => 'add-item']);
                }
            }
            $this->model->saveItem(['id' => $order_id, 'is_course_active' => '1','status' => 'complete'], ['task' => 'edit-item']);
        } catch (\Throwable $e) {
            # code...
        }

        $result = [
            'comboCourse' => $comboCourse,
            'course' => $course,
            'courseActive' => $courseActive,
            'params' => $params,
            'user' => $user,
            'redirect' => route('admin_order/activeCourse',['code' => $code]),
        ];
        return $result;
    }
}
