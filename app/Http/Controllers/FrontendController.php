<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
class FrontendController extends Controller
{
    public function index(){
        
        $latest_products =Product::where('publication_status', 1)
               ->orderBy('id', 'desc')
               ->take(8)
               ->get();
        $all_product =Product::where('publication_status', 1)
               ->get();
        
//        $category =Category::where('publication_status', 1)code in apps provider
//               ->get();

        return view('frontend/index_frontend',['product'=>$latest_products,'allproduct'=>$all_product]);
    }
    public function product_details_view($product_id)
    {
        $products = Product::find($product_id);
        $related_products= Product::where('category_id',$products->category_id)->where('id','!=',$products->id)->get();
        return view('frontend/details_product',['product'=>$products,'related_products'=>$related_products]);
    }
    public function shop_view()
    {
        $all_product =Product::where('publication_status', 1)->paginate(6);
//        $category =Category::where('publication_status', 1)->get();
        return view('frontend.shop_view',['allproduct'=>$all_product]);
    }
    public function show_category_products($category_id)
    {
        $category_product =Product::where('publication_status', 1)->where('category_id',$category_id)->paginate(6);
//        $category =Category::where('publication_status', 1)->get();
        return view('frontend.shop_view',['allproduct'=>$category_product]);
    }
}
