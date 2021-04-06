<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
         $Product = Product::find($request->product_id);
        
            Cart::add([
        'id' => $Product->id,
        'name' => $Product->product_name,
        'price' => $Product->price,
        'quantity' => $request->product_quantity,
        'attributes' => [ 
            'image'=>$Product->product_image,
         ]
      ]);
        
        return redirect()->route('show_category_products',['cat_id'=>$Product->category_id]);
    }
    public function cart_product_remove($product_id)
    {
        Cart::remove($product_id);
        return back();
    }
     public function cart_product_update(Request $request)
    {
        
         Cart::update($request->product_id, [
          'quantity' => [
              'relative' => false,
              'value' => $request->product_quantity,
          ],
        ]);
         
         return back();
    }
    
}
