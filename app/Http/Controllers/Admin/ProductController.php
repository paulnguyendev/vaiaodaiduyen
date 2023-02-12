<?php
namespace App\Http\Controllers\Admin;
use App\Helpers\Obn;
use App\Http\Controllers\Controller;
use App\Models\ProductMetaModel;
use App\Models\SupplierModel;
use App\Models\TaxonomyModel;
#Request
#Model
use App\Models\ProductModel as MainModel;
use App\Models\TaxonomyRelationshipModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
#Mail
use Illuminate\Support\Facades\Mail;
// use App\Mail\NewUserMail;
#Helper
class ProductController extends Controller
{
    private $pathViewController     = "admin.pages.product.";
    private $controllerName         = "product";
    private $title         = "Sản phẩm";
    private $model;
    private $params                 = [];
    function __construct()
    {
        $this->model = new MainModel();
        $this->taxonomyModel = new TaxonomyModel();
        $this->supplierModel = new SupplierModel();
        $this->productMetaModel = new ProductMetaModel();
        $this->taxonomyRelationshipModel = new TaxonomyRelationshipModel();
        View::share('controllerName', $this->controllerName);
        View::share('title', $this->title);
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
        $categories = $this->taxonomyModel::withDepth()->get()->toFlatTree()->where('taxonomy', 'product_cat')->pluck('name_with_depth', 'id');
        $suppliers =  $this->supplierModel->listItems([], ['task' => 'list']);
        $id = $request->id;
        $item = $this->model->getItem(['id' => $id], ['task' => 'id']);
        $item_meta = $this->productMetaModel->getItem(['product_id' => $id], ['task' => 'product_id']);
        $taxonomy = [];
        $taxonomy_ids = [];
        $taxonomy_second_ids = [];
        if ($id) {
            $taxonomy = $this->model::find($id)->taxonomy()->get();
            $taxonomy = $taxonomy ? $taxonomy->toArray() : [];
            $taxonomySecond = $this->model::find($id)->taxonomy()->where('taxonomy_type', 'second')->get();
            $taxonomySecond = $taxonomySecond ? $taxonomySecond->toArray() : [];
            $taxonomy_ids = array_column($taxonomy, 'id');
            $taxonomy_second_ids = array_column($taxonomySecond, 'id');
        }
        return view(
            "{$this->pathViewController}form",
            [
                'categories' => $categories,
                'suppliers' => $suppliers,
                'item' => $item,
                'id' => $id,
                'item_meta' => $item_meta,
                'taxonomy_ids' => $taxonomy_ids,
                'taxonomy_second_ids' => $taxonomy_second_ids,
            ]
        );
    }
    public function save(Request $request)
    {
        $params = $request->all();
        $id = isset($params['id']) ? $params['id'] : "";
        $is_published = isset($params['is_published']) ? $params['is_published'] : "1";
        $error = [];
        $paramsProduct = [];
        $paramsMeta = [];
        $paramsTaxonomyRelationship = [];
        $taxonomyList = [];
        if (!$params['title']) {
            $error['title'] = "Chưa nhập tên sản phẩm";
        }
        if (!$params['supplier_id']) {
            $error['supplier_id'] = "Chưa chọn nhà cung cấp";
        }
        if (!$params['slug']) {
            $error['slug'] = "Chưa chọn đường dẫn";
        }
        if ($params['price_sale'] > $params['price']) {
            $error['price_sale'] = "Giá khuyến mãi không được lớn hơn giá gốc";
        }
        if (empty($error)) {
            $created_at = date('Y-m-d H:i:s');
            $params['created_at'] = date('Y-m-d H:i:s');
            $paramsProduct = [
                'title' => $params['title'],
                'code' => $params['code'],
                'slug' => $params['slug'],
                'thumbnail' => $params['thumbnail'],
                'point' => $params['point'],
                'sale_price' => $params['price_sale'],
                'regular_price' => $params['price'],
                'percent' => $params['percent'],
                'in_stock' => $params['in_stock'],
                'stock' => $params['stock'],
                'is_published' => $is_published,
                'created_at' => $params['created_at'],
                'supplier_id' => $params['supplier_id'],
            ];
            $paramsMeta = [
                'description' => $params['description'],
                'content' => $params['content'],
                'gallery' => $params['gallery'],
                'created_at' => $created_at,
            ];
            $cat_id = isset($params['cat_id']) ? $params['cat_id'] : "";
            $other_cat_ids = isset($params['other_cat_ids']) ? $params['other_cat_ids'] : [];
            if (!$id) {
                #_Add Product
                $product_id = $this->model->saveItem($paramsProduct, ['task' => 'add-item']);
                if ($product_id) {
                    #_Add Product Meta
                    $paramsMeta['product_id'] = $product_id;
                    $this->productMetaModel->saveItem($paramsMeta, ['task' => 'add-item']);
                    #_Add Taxonomy Relationships
                    $taxonomyMain = [
                        [
                            'product_id' => $product_id,
                            'taxonomy_id' => $cat_id,
                            'taxonomy_type' => 'main',
                        ]
                    ];
                    $taxonomySecond = [];
                    if (count($other_cat_ids) > 0) {
                        foreach ($other_cat_ids as $key_otherCatID => $other_cat_id) {
                            $taxonomySecond[$key_otherCatID]['taxonomy_id'] = $other_cat_id;
                            $taxonomySecond[$key_otherCatID]['taxonomy_type'] = 'second';
                            $taxonomySecond[$key_otherCatID]['product_id'] = $product_id;
                        }
                        $taxonomyList = array_merge($taxonomyMain, $taxonomySecond);
                    } else {
                        $taxonomyList = $taxonomyMain;
                    }
                    if (count($taxonomyList) > 0) {
                        foreach ($taxonomyList as $paramsTaxonomyRelationship) {
                            $this->taxonomyRelationshipModel->saveItem($paramsTaxonomyRelationship, ['task' => 'add-item']);
                        }
                    }
                }
            } else {
                #_Edit Product
                $paramsProduct['id'] = $id;
                $this->model->saveItem($paramsProduct, ['task' => 'edit-item']);
                #_Edit product meta
                $paramsMeta['product_id'] = $id;
                $this->productMetaModel->saveItem($paramsMeta, ['task' => 'edit-item']);
                #_Edit taxonomy relationship
                if (count($other_cat_ids) > 0) {
                    #_Delete item cũ
                    $taxonomy = $this->model::find($id)->taxonomy()->get()->toArray();
                    if (count($taxonomy) > 0) {
                        foreach ($taxonomy as $item_taxonomy) {
                            $this->taxonomyRelationshipModel->deleteItem(
                                [
                                    'taxonomy_id' => $item_taxonomy['id'],
                                    'product_id' => $id,
                                ],
                                ['task' => 'taxonomy_id']
                            );
                        }
                    }
                    #_Add item mới
                    $taxonomyMain = [
                        [
                            'product_id' => $id,
                            'taxonomy_id' => $cat_id,
                            'taxonomy_type' => 'main',
                        ]
                    ];
                    $taxonomySecond = [];
                    if (count($other_cat_ids) > 0) {
                        foreach ($other_cat_ids as $key_otherCatID => $other_cat_id) {
                            $taxonomySecond[$key_otherCatID]['taxonomy_id'] = $other_cat_id;
                            $taxonomySecond[$key_otherCatID]['taxonomy_type'] = 'second';
                            $taxonomySecond[$key_otherCatID]['product_id'] = $id;
                        }
                        $taxonomyList = array_merge($taxonomyMain, $taxonomySecond);
                    } else {
                        $taxonomyList = $taxonomyMain;
                    }
                    if (count($taxonomyList) > 0) {
                        foreach ($taxonomyList as $paramsTaxonomyRelationship) {
                            $this->taxonomyRelationshipModel->saveItem($paramsTaxonomyRelationship, ['task' => 'add-item']);
                        }
                    }
                }
            }
            $params['redirect'] = route("{$this->controllerName}/index");
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
        // [
        //     "id" => "29",
        //     "code" => "",
        // "thumbnail" => [
        //     "lazy_src" => "data-isrc",
        //     "img_path" => "https://media.loveitopcdn.com/34798/thumb/80x80/jahi-central-home-loc-an.jpg?zc=1",
        //     "class" => "lazyload ",
        //     "alt_content" => ""
        // ],
        //     "price" => "0",
        //     "sale_price" => "0",
        //     "updated_at" => "2022-12-23 01:39:24",
        //     "in_stock" => "1",
        //     "quantity" => "0",
        //     "allow_out_of_stock_order" => "0",
        //     "published_at" => "2021-07-08 09:05:45",
        //     "cat_id" => "325",
        //     "manufacturer_id" => "0",
        //     "is_published" => "1",
        //     "sort_order" => "29",
        //     "deleted_at" => "",
        //     "deleted_by" => "",
        //     "description" => [
        //         "product_id" => "29",
        //         "title" => "Khu dân cư Jahi-Central Home Lộc An"
        //     ],
        //     "seo" => [
        //         "id" => "1080",
        //         "slug" => "can-ho-pearl-plaza-3-phong-ngu-tang-11",
        //         "robots" => "1",
        //         "taxonomy_type" => "product",
        //         "taxonomy_id" => "29",
        //         "lang_code" => "vi",
        //         "meta_title" => "Đất nền TRUNG TÂM giá rẻ ở Lâm Đồng | Jahi-Central Home Lộc An",
        //         "meta_keyword" => "Jahi central home lộc an, jahi central home loc an",
        //         "meta_description" => "Tọa lạc ngay trung tâm xã Lộc An, huyện Bảo Lâm, tỉnh Lâm Đồng. Khu dân cư Jahi-Central Home Lộc An thừa hượng trọn vẹn hệ thống giao thương trọng điểm của xa Lộc An.",
        //         "other_link" => "",
        //         "is_newtab_other_link" => "0"
        //     ],
        //     "category" => [
        //         "id" => "325",
        //         "description" => [
        //             "cat_id" => "325",
        //             "title" => "Dự án "
        //         ]
        //     ],
        //     "manufacturer" => "",
        //     "price_formated" => "0đ",
        //     "sale_price_formated" => "0đ",
        //     "route_duplicate" => "https://dainghiagroup.com/admin/product/duplicate/29",
        //     "route_edit" => "https://dainghiagroup.com/admin/product/29/edit",
        //     "route_update" => "https://dainghiagroup.com/admin/product/29/update-field",
        //     "route_remove" => "https://dainghiagroup.com/admin/product/29",
        //     "direct_add_to_cart_url" => "https://dainghiagroup.com/add-to-cart/29",
        //     "route_review" => "https://dainghiagroup.com/du-an-dat-nen-bao-loc/can-ho-pearl-plaza-3-phong-ngu-tang-11.html",
        //     "move_up" => "https://dainghiagroup.com/admin/product/29/move?direction=up&amp;range=1",
        //     "move_down" => "https://dainghiagroup.com/admin/product/29/move?direction=down",
        //     "move_top" => "https://dainghiagroup.com/admin/product/29/move?direction=top",
        //     "move_bottom" => "https://dainghiagroup.com/admin/product/29/move?direction=bottom",
        //     "is_advanced_quantity" => "",
        //     "published_at_formated" => "08-07-2021 09:05:45",
        //     "deleted_at_formated" => "01-01-1970 08:00:00"
        // ],
        $data = [];
        $params = $request->all();
        $draw = isset( $params['draw']) ? $params['draw'] : "";
        $start = isset( $params['start']) ? $params['start'] : "";
        $length = isset( $params['length']) ? $params['length'] : "";
        $search = isset( $params['search']) ? $params['search'] : "";
        $searchValue = isset($search['value']) ? $search['value'] : "";
        if(!$searchValue) {
            $data = $this->model->listItems(['start' => $start,'length' => $length], ['task' => 'list']);
        }
        else {
            $data = $this->model->listItems(['title' => $searchValue], ['task' => 'search']);
        }
       
        $total = count($data);
        $data  = $total > 0 ? $data->toArray() : [];
        $data = array_map(function ($item) {
            $id = $item['id'];
            $item['route_edit'] = route('product/form',['id' => $id]);
            $item['published_at'] = "";
            $item['description'] = [
                'title' => $item['title'],
            ];
            $product = $this->model::find($id);
            $taxonomy = $product->taxonomy()->where('taxonomy_type','main')->first();
            $item['taxonomy'] = $taxonomy;
            $item['category'] = [
                "id" =>$taxonomy->id,
                "description" => [
                    "cat_id" => $taxonomy->id,
                    "title" => $taxonomy->name,
                ]
            ];
            $item["thumbnail"] = [
                "lazy_src" => "data-isrc",
                "img_path" => $item['thumbnail'],
                "class" => "lazyload ",
                "alt_content" => ""
            ];
            $item['is_advanced_quantity'] = 0;
            $item['route_update'] = route('product/updateField',['id' => $id]);
            $item['direct_add_to_cart_url'] = route('fe_cart/add',['id' => $id]);
            $item['route_review'] = route('fe_product/detail',['id' => $id]);
            $item['price'] = $item['regular_price'];
            $item['price_formated'] = Obn::showPrice($item['regular_price']);
            if($item['sale_price']) {
                $item['sale_price_formated'] = Obn::showPrice($item['sale_price']);
            }
            $item['published_at'] = $item['created_at'];
            $item['route_remove'] = route('product/delete',['id' => $id]);
            return $item;
        }, $data);
        $result = [
            "draw" => 0,
            "recordsTotal" => $this->model->count(),
            "recordsFiltered" => $this->model->count(),
            "data" => $data
        ];
        return $result;
    }
    public function delete(Request $request) {
        $id = $request->id;
        $this->model->deleteItem(['id' => $id],['task' => 'delete']);
        return [
            'success' => true,
            'message' => 'Đã chuyển nội dung vào thùng rác'
        ];
    }
    public function updateField(Request $request) {
        $id = $request->id;
        $params = $request->all();
        $published_at = isset($params['published_at']) ? $params['published_at']  : "";
        $is_published = isset($params['is_published']) ? $params['is_published']  : "";
        $value = isset($params['value']) ? $params['value']  : "";
        $name = isset($params['name']) ? $params['name']  : "";
        $price = isset($params['price']) ? $params['price']  : "";
        $paramsUpdate['id'] = $id;
        $isUpdate = false;
        $reload = false;
        if($published_at) {
            $paramsUpdate['created_at'] = $published_at;
            $isUpdate = true;
        }
        if($is_published != '') {
            $paramsUpdate['is_published'] = $is_published;
            $isUpdate = true;
        }
        if($name) {
            if($value)  {
                $paramsUpdate['in_stock'] = 1;
            }
            else {
                $paramsUpdate['in_stock'] = 0;
            }
           
            $isUpdate = true;
        }
        if($price) {
            $isUpdate = true;
            $paramsUpdate['regular_price'] = $price;
            $reload = true;
        }
     
        if(  $isUpdate == true) {
            $this->model->saveItem($paramsUpdate,['task' => 'edit-item']);
        }
       

        
        return [
            'id' => $id,
            'value' => $value,
            'reload' => $reload,
        ];
        
    }
    public function destroyMulti(Request $request) {
        $ids = $request->ids;
        if(count($ids) > 0) {
            foreach ($ids as $id) {
                $this->model->deleteItem(['id' => $id],['task' => 'delete']);
            }
        }
        return $ids;
    }
}
