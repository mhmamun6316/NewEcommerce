<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
//use Mail;
use Session;
use App\Shipping;
//use App\Mail\SentMail;
use App\Order;
use App\OrderDetail;
use Cart;

class CheckoutController extends Controller
{
    public function customer_form_view()
    {
        return view('frontend.checkout.customer_form');
    }
    public function form_signup(Request $request)
    {
        $customer = new Customer();
        $customer->first_name =$request->first_name;
        $customer->last_name =$request->last_name;
        $customer->email_address =$request->email_address;
        $customer->phone_number =$request->phone_number;
        $customer->password =bcrypt($request->password);
        $customer->address =$request->address;
        $customer->save();
        
        Session::put(['customer_id'=>$customer->id]);
        Session::put(['customer_full_name'=>$customer->first_name.' '.$customer->last_name]);
//        Mail::to($customer->email_address)->send(new SentMail($customer));
        return redirect('/shipping/form');
        
    }
    public function shipping_form_view()
    {
        $customer = Customer::find(Session::get('customer_id'));
        return view('frontend.checkout.shipping_form',['customer'=>$customer]);
    }
    
    public function save_shipping_info(Request $request)
    {
        $shipping = new Shipping();
        $shipping->full_name =$request->full_name;
        $shipping->email_address =$request->email_address;
        $shipping->phone_number =$request->phone_number;
        $shipping->address =$request->address;
        
        $shipping->save();
        
        Session::put(['shipping_id'=>$shipping->id]);
        Session::put(['shipping_full_name'=>$shipping->full_name]);
        return redirect('/checkout/payment');
        
    }
    public function payment_info_show()
    {
        return view('frontend.checkout.payment_form');
    }
    public function order_info_save(Request $request)
    {
//        return $request->payment_type;
        if($request->payment_type == 'Cash')
        {
            $order= new Order();
            $order->customer_id=Session::get('customer_id');
            $order->shipping_id=Session::get('shipping_id');
            $order->total_price=Session::get('Subtotal');
            $order->payment_type=$request->payment_type;
            $order->save();
            
//            return $order->id;
            
            $CartContents= Cart::getContent();
            
            foreach($CartContents as $CartContent)
            {
                $OrderDetail= new OrderDetail();
                $OrderDetail->order_id=$order->id;
                $OrderDetail->product_id=$CartContent->id;
                $OrderDetail->product_name=$CartContent->name;
                $OrderDetail->product_image=$CartContent->attributes->image;
                $OrderDetail->product_price=$CartContent->price;
                $OrderDetail->product_quantity=$CartContent->quantity;
                $OrderDetail->save(); 
            }
            
            Cart::clear();
            return redirect('/');
            
        }
        elseif($request->payment_type == 'Paypal')
        {
            
        }
        elseif($request->payment_type == 'Bkash')
        {
            
        }
    }
    public function customer_logout()
    {
        Session()->forget(['customer_id','customer_full_name','shipping_id','shipping_full_name']);
        return redirect('/');
    }
    public function customer_Login_view(Request $request)
    {
        $customer=Customer::where('email_address',$request->email_address)->first();
        if(Customer::where('email_address',$request->email_address)->first())
        {
            if(password_verify($request->password,$customer->password))
            {
                Session::put(['customer_id'=>$customer->id]);
                Session::put(['customer_full_name'=>$customer->first_name.' '.$customer->last_name]);
                return redirect()->route('shipping_form');
            }
            else 
            {
                return back()->with('wrong_info','Password is invalid');
            }
        }
        else 
        {
            return back()->with('wrong_info','Email Address is invalid');
        }
    }
}
