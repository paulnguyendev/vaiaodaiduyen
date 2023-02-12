<?php
namespace App\Http\Controllers\User;
use App\Helpers\Link\ProductLink;
use App\Helpers\User;
use App\Http\Controllers\Controller;
#Request
#Model
use App\Models\UserModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
#Mail
use Illuminate\Support\Facades\Mail;
// use App\Mail\NewUserMail;
#Helper
class AffiliateController extends Controller
{
    private $pathViewController     = "user.pages.affiliate";
    private $controllerName         = "user_aff";
    private $model;
    private $params                 = [];
    function __construct()
    {
        $this->model = new UserModel();
        View::share('controllerName', $this->controllerName);
    }
    public function index(Request $request)
    {
        $navbar_title = "Danh sách thành viên";
        return view(
            "{$this->pathViewController}/index",
            [
                'navbar_title' => $navbar_title,
            ]
        );
    }
    public function form(Request $request)
    {
        $navbar_title = "Nhập mã giới thiệu";
        $user = User::getInfo();
        $parent_id = $user['parent_id'] ?? "";
        
        return view(
            "{$this->pathViewController}/form",
            [
                'navbar_title' => $navbar_title,
                'parent_id' => $parent_id,
            ]
        );
    }
    public function dataList(Request $request)
    {
        $result = [];
        $user_id = User::getInfo('', 'id');
        $user = $this->model::find($user_id);
        $items = $this->model::defaultOrder()->descendantsOf($user_id);
        $items = $items ? $items->toArray() : [];
        $items = array_map(function ($item) {
            $result = $this->model::withDepth()->find($item['id']);
            $level = $result->depth;
            $item['level'] =  $level;
            return $item;
        }, $items);
        $total = count($items);
        $items =  array_map(function ($item) {
            $id = $item['id'];
            $item['created_at'] = date('H:i:s d/m/Y', strtotime($item['created_at']));
            $user = $this->model::find($id);
            $totalIncome = $user->payment_history()->where('status', 'approve_success')->sum('total_commission');
            $totalIncome = number_format($totalIncome) . " đ";
            $item['total'] = $totalIncome;
            $item['route_edit'] = "#";
            #_Status
            $status = $item['status'];
            $status = $status ? $status : 'default';
            $tpl_status = config('obn.status.template');
            $current_status = isset($tpl_status[$status]) ? $tpl_status[$status] : $tpl_status['default'];
            $xhtml_status = sprintf('<span class = "badge %s">%s</span>', $current_status['class'], $current_status['name']);
            $item['status'] = $xhtml_status;
            return $item;
        }, $items);
        $result = [
            'draw' => 0,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $items,
        ];
        return $result;
    }
    public function save(Request $request)
    {
        $params = $request->all();
        $user_id = User::getInfo('','id');
        $error = [];
        $user = [];
        $parent_id = null;
        if (!$params['code']) {
            $error['code'] = "Chưa nhập mã code";
        }
        else {
            $user = $this->model->getItem($params, ['task' => 'code']);
            if(!$user) {
                $error['code'] = "Mã code không tồn tại";
            }
        }
       
        $params['user'] = $user;
        if (empty($error)) {
            $params['redirect'] =route("{$this->controllerName}/form");
            $parent_id = $user['id'];
            $params['parent_id'] = $parent_id;
            session()->flash('status_success', 'Nhập mã giới thiệu thành công');
            $this->model->saveItem(['id' => $user_id,'parent_id' => $parent_id], ['task' => 'edit-item']);
            // $params['created_at'] = date('Y-m-d H:i:s');
            // $params['redirect'] = route("{$this->controllerName}/index");
            return response()->json($params);
        } else {
            return response()->json(
                $error,
                422,
            );
        }
    }
}
