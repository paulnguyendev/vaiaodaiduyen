<?php
namespace App\Http\Controllers\User;

use App\Helpers\User;
use App\Http\Controllers\Controller;
#Request
#Model
use App\Models\UserModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
#Mail
use Illuminate\Support\Facades\Mail;
// use App\Mail\NewUserMail;
#Helper
class DashboardController extends Controller
{
    private $pathViewController     = "user.pages.dashboard";
    private $controllerName         = "dashboard";
    private $model;
    private $params                 = [];
    function __construct()
    {
        $this->model = new UserModel();
        View::share('controllerName', $this->controllerName);
    }
    public function index(Request $request)
    {
        $user_id = User::getInfo('','id');
        $user = UserModel::find($user_id);
        #_Total Income
        $totalIncome = $user->payment_history()->where('status','approve_success')->sum('total_commission');
        $totalIncome = number_format($totalIncome) . " đ";
        #_Total Order
        $totalOrder = $user->order()->count();
        #_Total Order Success
        $totalOrderSuccess = $user->order()->where('status','complete')->count();
        $is_affiliate = $user['is_affiliate'] ?? 0;
       
        return view(
            "{$this->pathViewController}/index",
            [
                'totalIncome' => $totalIncome,
                'totalOrder' => $totalOrder,
                'totalOrderSuccess' => $totalOrderSuccess,
                'is_affiliate' => $is_affiliate,
            ]
        );
    }
}
