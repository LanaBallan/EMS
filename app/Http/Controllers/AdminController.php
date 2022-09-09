<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
public function check(Request $request)
{
    $request->validate([
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required', 'string', 'min:8'],
    ]);

    $creds = $request->only('email', 'password');

    if (Auth::guard('admin')->attempt($creds)) {
        return redirect()->route('admin.home');
    }
    else if(Auth::attempt($creds))
    {
        return redirect("/");
    }
    else if(Auth::guard('manager')->attempt($creds)) {
        return redirect()->route('manager.register');
    }
    else {
        return redirect()->route('admin.login')->with('fail', 'Incorrect Credentials');
    }
}
    public function logout()
{
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login');
}
public function home()
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


}

