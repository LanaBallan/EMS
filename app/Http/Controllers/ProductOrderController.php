<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductOrderController extends Controller
{
    public function add($id)
{
    $locations=Location::get();
    return view('Order.productOrder',compact('locations','id'));
}
public function store($id,Request $request)
{
    $order=new Order;
    $data = $request->input();
    $order->quantity=$data['quantity'];
   $product=Product::find($id);
   $location=Location::find($data['location_id']);
   $order->total_price=(($product->price)*($data['quantity']))+($location->cost);
   $order->note=$data['note'];
   $order->confirmed=0;
   $order->user_id=Auth::user()->id;
  $order->location_id=$data['location_id'];
   $order->product_id=$id;
  $order->save();
    return redirect('/user/all/orders');

}
public function all()
{
    $orders=Order::join('locations', 'locations.id', '=', 'orders.location_id')
        ->join('products','products.id', '=', 'orders.product_id')
        ->where('orders.user_id',Auth::user()->id)
        ->where('orders.confirmed',0)
        ->select('orders.id as orderId','products.name as productName','products.price as productPrice'
        ,'orders.quantity','orders.note','locations.cost','orders.total_price','locations.name as locationName')
        ->get();
    return view('Order.allProductOrder',compact('orders'));
}
public function delete($id)
{
    $order=Order::where('id',$id)->first();
    $order->delete();
    return redirect()->back();
}
public function confirm($id)
{
    $order=Order::where('id',$id)->first();
    $order->confirmed=1;
    $order->save();
    return redirect()->back();
}
public function adminAll()
{
    $orders=Order::join('locations', 'locations.id', '=', 'orders.location_id')
        ->join('products','products.id', '=', 'orders.product_id')
        ->join('users','users.id','=','orders.user_id')
        ->where('orders.confirmed',1)
        ->select('users.f_name','users.l_name','users.phone',
            'orders.id as orderId','products.name as productName','products.price as productPrice'
            ,'orders.quantity','orders.note','locations.cost','orders.total_price','locations.name as locationName')
        ->get();
    return view('Admin.Product.allOrders',compact('orders'));
}
public function adminDelete($id)
{
    $order=Order::where('id',$id)->first();
    $order->delete();
    return redirect()->back();
}
}
