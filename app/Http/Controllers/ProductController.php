<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use Image;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function Add_product()
    {
        
        $category = DB::table('categories')->where('Publication_Status',1)->get();
        return view('admin.product.product_add_form',['categories'=>$category]);
    }
    
    public function product_save(Request $request)
    {
      
        $validated = $request->validate([
        'product_name' => 'required',
        'category_id' => 'required',
        'product_short_description' => 'required',
         'product_long_description' => 'required',
             'price' => 'integer',
             'publication_status' => 'required',
       ]);
        
          $last_inserted_id = DB::table('products')->insertGetId([
         'product_name'=>$request->product_name,    
         'category_id'=>$request->category_id, 
         'product_short_description'=>$request->product_short_description,
         'product_long_description'=>$request->product_long_description,
         'price'=>$request->price,
         'publication_status'=>$request->publication_status, 
         'created_at'=>Carbon::now(),
      ]);
        

        
        if ($request->hasFile('product_image')) {
            
            $filename= $last_inserted_id.'.'.$request->product_image->getclientoriginalextension();
            Image::make($request->product_image)->resize(300, 200)->save(base_path('public/uploads/product_images/'.$filename));
            DB::table('products')
            ->where('id', $last_inserted_id)
            ->update([
                'product_image' => $filename
            ]); 
        }
        return redirect('/Add/Product')->with('status_msg','product_inserted_successfully');
        
    }
    
    public function product_manage()
    {
        $product=Product::orderBy('id','desc')->paginate(5);
//        $product = DB::table('products')->paginate(5);
        return view('admin.product.product_manage',['products'=>$product]);
    }
    public function delete_product_manage()
    {
       
        $softdeletedproduct=Product::onlyTrashed()->paginate(5);
        return view('admin.product.deleted_product_manage',['softdeletedproducts'=>$softdeletedproduct]);
    }
    
     public function restore_delete($id)
    { 
        Product::withTrashed()->where('id',$id)->restore();
        return back()->with('status_msg','Product_Restored_successfully');;
    }
         
    public function parmanent_delete($id)
    { 
        $product= Product::withTrashed()->find($id);
        if($product->product_image=='product_image.jpg')
        {
            Product::withTrashed()->where('id',$id)->forceDelete();
            return back()->with('status_msg','Product_parmanent_deleted_successfully');
        }
        else
        {
            unlink(base_path('public/uploads/product_images/'.$product->product_image));
            Product::withTrashed()->where('id',$id)->forceDelete();
            return back()->with('status_msg','Product_parmanent_deleted_successfully');
        }
    }
        
    public function unpublish_product($id)
    {
       DB::table('products')
            ->where('id', $id)
            ->update(['publication_status' => 0]);
       return back()->with('status_msg','Product_unpublished_successfully'); 
    }
    
    public function publish_product($id)
    {
       DB::table('products')
            ->where('id', $id)
            ->update(['publication_status' => 1]);
       return back()->with('status_msg','Product_published_successfully'); 
    }
    
    public function product_delete($id)
    {
        
//       DB::table('products')->where('id', $id)->delete();
       $product = Product::where('id', $id)->delete();
       return back()->with('status_msg','Product_Deleted_successfully');
    }
    
    public function product_edit($id)
    {
       $category = DB::table('categories')->where('Publication_Status',1)->get();
       $product= DB::table('products')->where('id', $id)->first();
       return view('admin.product.product_edit',['products'=>$product,'categories'=>$category]);
    }
    
    public function product_update(Request $request)
    {
      
        $validated = $request->validate([
        'product_name' => 'required',
        'category_id' => 'required',
        'product_short_description' => 'required',
        'product_long_description' => 'required',
        'price' => 'integer',
        'publication_status' => 'required',
       ]);
        
        DB::table('products')->where('id',$request->product_id)->update([
         'product_name'=>$request->product_name,    
         'category_id'=>$request->category_id, 
         'product_short_description'=>$request->product_short_description,
         'product_long_description'=>$request->product_long_description,
         'price'=>$request->price,
         'publication_status'=>$request->publication_status, 
      ]);
        
        if ($request->hasFile('product_image')) {
            
            $product=Product::find($request->product_id);
            if($product->product_image=='product_image.jpg')
            {
                $filename= $request->product_id.'.'.$request->product_image->getclientoriginalextension();
                Image::make($request->product_image)->resize(300, 200)->save(base_path('public/uploads/product_images/'.$filename));
                DB::table('products')
                ->where('id', $request->product_id)
                ->update([
                    'product_image' => $filename
                ]);
            }else
            {
                unlink(base_path('public/uploads/product_images/'.$product->product_image));
                $filename= $request->product_id.'.'.$request->product_image->getclientoriginalextension();
                Image::make($request->product_image)->resize(300, 200)->save(base_path('public/uploads/product_images/'.$filename));
                DB::table('products')
                ->where('id', $request->product_id)
                ->update([
                    'product_image' => $filename
                ]);
            }  
             
        }
        return redirect('/manage/Product')->with('status_msg','product_updated_successfully');
    }
}
