<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Meal;
use App\Models\MealOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealOrderController extends Controller
{
    public function add($id)
    {
        $locations=Location::get();
        return view('Order.mealOrder',compact('locations','id'));
    }
    public function store($id,Request $request)
    {
        $order=new MealOrder;
        $data = $request->input();
        $order->quantity=$data['quantity'];
        $meal=Meal::find($id);
        $location=Location::find($data['location_id']);
        $order->total_price=(($meal->price)*($data['quantity']))+($location->cost);
        $order->note=$data['note'];
        $order->confirmed=0;
        $order->user_id=Auth::user()->id;
        $order->location_id=$data['location_id'];
        $order->meal_id=$id;
        $order->save();
        return redirect('/user/all/mealorders');

    }
    public function all()
    {
        $orders=MealOrder::join('locations', 'locations.id', '=', 'meal_orders.location_id')
            ->join('meals','meals.id', '=', 'meal_orders.meal_id')
            ->where('meal_orders.user_id',Auth::user()->id)
            ->where('meal_orders.confirmed',0)
            ->select('meal_orders.id as orderId','meals.name as mealName','meals.price as mealPrice'
                ,'meal_orders.quantity','meal_orders.note','locations.cost','meal_orders.total_price','locations.name as locationName')
            ->get();
        return view('Order.allMealOrder',compact('orders'));
    }
    public function delete($id)
    {
        $order=MealOrder::where('id',$id)->first();
        $order->delete();
        return redirect()->back();
    }
    public function confirm($id)
    {
        $order=MealOrder::where('id',$id)->first();
        $order->confirmed=1;
        $order->save();
        return redirect()->back();
    }
    public function adminAll()
    {
        $orders=MealOrder::join('locations', 'locations.id', '=', 'meal_orders.location_id')
            ->join('meals','meals.id', '=', 'meal_orders.meal_id')
            ->join('users','users.id', '=', 'meal_orders.user_id')
            ->where('meal_orders.confirmed',1)
            ->select('users.f_name','users.l_name','users.phone',
                'meal_orders.id as orderId','meals.name as mealName','meals.price as mealPrice'
                ,'meal_orders.quantity','meal_orders.note','locations.cost','meal_orders.total_price','locations.name as locationName')
            ->get();
        return view('Admin.Meal.allOrders',compact('orders'));
    }
    public function adminDelete($id)
    {
        $order=MealOrder::where('id',$id)->first();
        $order->delete();
        return redirect()->back();
    }
}
