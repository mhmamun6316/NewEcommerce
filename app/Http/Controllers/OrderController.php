<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Order;
Use App\Customer;
Use App\Shipping;
Use App\OrderDetail; 
use PDF;


class OrderController extends Controller
{
    public function order_manage_view()
    {
        $orders=Order::all();
        return view('admin.order.order_manage',compact('orders'));
    }
    public function order_details_view($order_id)
    {
        $order=Order::find($order_id);
        $customer=Customer::find($order->customer_id);
        $shipping=Shipping::find($order->shipping_id);
        $order_details=OrderDetail::where('order_id',$order_id)->get();
        return view('admin.order.order_details',compact('order','customer','shipping','order_details'));
    }
    
    public function order_invoice_view($order_id)
    {
        $order=Order::find($order_id);
        $customer=Customer::find($order->customer_id);
        $shipping=Shipping::find($order->shipping_id);
        $order_details=OrderDetail::where('order_id',$order_id)->get();
        return view('admin.order.order_invoice',compact('order','customer','shipping','order_details'));
    }
    
    public function order_invoice_download($order_id)
    {
        $order=Order::find($order_id);
        $customer=Customer::find($order->customer_id);
        $shipping=Shipping::find($order->shipping_id);
        $order_details=OrderDetail::where('order_id',$order_id)->get();
        return view('admin.order.order_invoice_download',compact('order','customer','shipping','order_details'));
        
//        $pdf = PDF::loadView('pdf_view', $data);  
//        return $pdf->download('medium.pdf');
    }
}
