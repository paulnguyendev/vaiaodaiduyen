<?php
namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;
use App\Models\ProductMetaModel;
#Request
#Model
use App\Models\ProductModel as MainModel;
use App\Models\SupplierModel;
use App\Models\TaxonomyModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
#Mail
use Illuminate\Support\Facades\Mail;
// use App\Mail\NewUserMail;
#Helper
class ProductController extends Controller
{
    private $pathViewController     = "frontend.pages.product";
    private $controllerName         = "product";
    private $model;
    private $params                 = [];
    function __construct()
    {
        $this->model = new MainModel();
        View::share('controllerName', $this->controllerName);
    }
    public function index(Request $request)
    {
        $category = $request->category;
        $category_child = $request->category_child;
        $product_slug = $request->product_slug;
        $view = null;
        if($product_slug) {
            $view = "detail";
        }
        elseif($category_child) {
            $view = "category_child";
        }
        else {
            if($category == 'gio-hang') {
                $view = "cart";
            }
            elseif($category == 'thanh-toan') {
                $view = "checkout";
            }
            elseif($category == 'hoan-tat-don-hang') {
                $view = "complete";
            }
            else {
                $view = "category";
            }
            
        }
       
        return view(
            "{$this->pathViewController}/{$view}",
            [
            ]
        );
    }
   
  
}
