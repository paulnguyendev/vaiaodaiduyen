<?php
namespace App\Http\Controllers\Admin;
use App\Helpers\User;
use App\Http\Controllers\Controller;
#Request
#Model
use App\Models\UserModel as MainModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
#Mail
use Illuminate\Support\Facades\Mail;
// use App\Mail\NewUserMail;
#Helper
class UserController extends Controller
{
    private $pathViewController     = "admin.pages.user.";
    private $controllerName         = "admin_user";
    private $model;
    private $params                 = [];
    function __construct()
    {
        $this->model = new MainModel();
        View::share('controllerName', $this->controllerName);
    }
    public function index(Request $request)
    {
        return view(
            "{$this->pathViewController}index",
            []
        );
    }
    public function form(Request $request)
    {
        $id = $request->id;
        $item = $this->model->getItem(['id' => $id], ['task' => 'id']);
        return view(
            "{$this->pathViewController}form",
            [
                'item' => $item,
                'id' => $id,
            ]
        );
    }
    public function detail(Request $request)
    {
        $id = $request->id;
        $user = $this->model::find($id);
        $code = $user->code;
        $total_balance = User::getTotalBalance($id);
        $available_balance = User::getTotalBalance($id,"available");
        $aff_link = route('fe_aff/index',['code' => $code]);
       
        // $item = $this->model->getItem(['id' => $id], ['task' => 'id']);
        return view(
            "{$this->pathViewController}detail",
            [
                'id' => $id,
                'total_balance' => $total_balance,
                'available_balance' => $available_balance,
                'aff_link' => $aff_link,
                'user' => $user,
            ]
        );
    }
    public function save(Request $request)
    {
        $params = $request->all();
        $id = $request->id;
        $error = [];
        if (!$params['title']) {
            $error['title'] = "Chưa nhập tên giáo viên";
        }
        if (!$params['position']) {
            $error['position'] = "Chưa nhập tên chức vụ";
        }
        if (empty($error)) {
            $params['created_at'] = date('Y-m-d H:i:s');
            if (!$id) {
                $this->model->saveItem($params, ['task' => 'add-item']);
            } else {
                $this->model->saveItem($params, ['task' => 'edit-item']);
            }
            $params['redirect'] = route('admin_teacher/index');
            return response()->json($params);
        } else {
            return response()->json(
                $error,
                422,
            );
        }
    }
    public function dataList(Request $request)
    {
        $search = $request->search;
        $searchValue = isset($search['value']) ? $search['value'] : "";
        if (!$searchValue) {
            $categories = $this->model->listItems([], ['task' => 'list'])->toArray();
        } else {
            $categories  = $this->model->listItems(['name' => $searchValue], ['task' => 'search'])->toArray();
        }
        $categories = array_map(function ($item) {
            $id = $item['id'];
            $item['total_course'] = 0;
            $item['fullname'] = $item['name'];
            $item['route_edit'] = route('admin_user/form', ['id' => $item['id']]);
            $item['route_remove'] = route('admin_user/delete', ['id' => $id]);
            $item['route_detail'] = route('admin_user/detail',['id' => $id]);
            $item['move_up'] = "#";
            $item['move_down'] = "#";
            $item['move_top'] = "#";
            $item['move_bottom'] = "#";
            $item['avaiable_balance'] = User::getTotalBalance($id,"avaiable");
            $item['total_balance'] = User::getTotalBalance($id);
            $code = $item['code'];
            $item['affilate_link'] = route('fe_aff/index',['code' => $code]);
            $item['transaction']['translated_status'] = "0";
            return $item;
        }, $categories);
        $total = count($categories);
        // [
        //     "id" => "297",
        //     "parent_id" => "0",
        //     "taxonomy" => "product",
        //     "sort_order" => "0",
        //     "thumbnail" => "",
        //     "description" => [
        //         "title" => "Dự án",
        //         "cat_id" => "297",
        //         "lang_code" => "vi"
        //     ],
        //     "seo" => [
        //         "id" => "1040",
        //         "slug" => "du-an",
        //         "robots" => "1",blank
        //         "taxonomy_type" => "category",
        //         "taxonomy_id" => "297",
        //         "lang_code" => "vi",
        //         "meta_title" => "Dự án",
        //         "meta_keyword" => "Dự án",
        //         "meta_description" => "Mô tả trang Dự án",
        //         "other_link" => "",
        //         "is_newtab_other_link" => ""
        //     ],
        //     "depth" => "0",
        //     "route_edit" => "https://dainghiagroup.com/admin/product/category/297/edit",
        //     "route_remove" => "https://dainghiagroup.com/admin/product/category/297",
        //     "move_up" => "https://dainghiagroup.com/admin/product/category/297/move?direction=up",
        //     "move_down" => "https://dainghiagroup.com/admin/product/category/297/move?direction=down",
        //     "move_top" => "https://dainghiagroup.com/admin/product/category/297/move?direction=top",
        //     "move_bottom" => "https://dainghiagroup.com/admin/product/category/297/move?direction=bottom"
        // ]
        return $result = [
            "draw" => 0,
            "recordsTotal" => $total,
            "recordsFiltered" => $total,
            "data" => $categories
        ];
        return "!23";
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $this->model->deleteItem(['id' => $id], ['task' => 'delete']);
        return $id;
    }
    public function destroyMulti(Request $request)
    {
        $ids = $request->ids;
        if (count($ids) > 0) {
            foreach ($ids as $id) {
                $this->model->deleteItem(['id' => $id], ['task' => 'delete']);
            }
        }
        return $ids;
    }
}
