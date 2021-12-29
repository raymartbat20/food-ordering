<?php

namespace App\Http\Controllers;

use App\Order;
use App\Category;
use App\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::with(['menus'])->get();

        return view('order.index',$data);
    }

    /**
     * Order Lists
     * 
     * @return View
     */
    public function lists()
    {
        $data['orders'] = Order::latest()->get();

        return view('order.lists',$data);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['order'] = Order::with([
            'order_details',
            'order_details.menu'
        ])->find($id);
        if($data['order']){
            return view('order.show',$data);
        } else {
            return redirect()->route('order.index')->with('error', 'No order found');
        }
    }

    /**
     * Checkout
     * 
     * @param Request $request
     * @return Response
     */
    public function checkout(CheckoutRequest $request)
    {
        $new_order = new Order;
        $new_order->customer_name = $request->get('customer_name');
        $new_order->coupon_used = $request->get('coupon_used');
        $new_order->payment = $request->get('amount_tendered');
        $new_order->total = $request->get('total_price');
        $new_order->tax = $request->get('tax');
        $new_order->total_items = $request->get('total_items');
        $new_order->change = $request->get('change');
        $new_order->save();
        
        foreach(json_decode($request->orders) as $order)
        {
            $order_detail = new OrderDetails(['order_id' => $new_order->id,'menu_id' => $order->id, 'qty' => $order->qty]);
            $order_detail->save();
        }

        return response()->json([
            "status" => true,
            "order_id" => $new_order->id,
            "message" => "success",
        ]);
    }
}
