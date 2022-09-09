<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function add()
    {
        return view('Admin.Restaurant.add');
    }
    public function store(Request $request)
    {

        $restaurant=new Restaurant;
        $data = $request->input();
        $restaurant->name=$data['name'];
        $restaurant->number=$data['number'];
        $restaurant->location=$data['location'];
        $restaurant->email=$data['email'];

        $imageName = rand().time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('upload'), $imageName);
        $restaurant->image=$imageName;
        $restaurant->save();
        return redirect('/admin/restaurant/all');
    }
    public function all()
    {
        $restaurants=Restaurant::get();
        return view('Admin.Restaurant.all',compact('restaurants'));
    }
    public function delete($id){
        $restaurant = Restaurant::find($id);
        $restaurant->delete();
        return back();
    }

    public function edit($id){
        $restaurant = Restaurant::find($id);
        return view('Admin.Restaurant.edit',compact( 'restaurant'));
    }

    public function update($id, Request $request){
        $data = $request->input();
        $restaurant = Restaurant::find($id);
        $restaurant->name=$data['name'];
        $restaurant->number=$data['number'];
        $restaurant->location=$data['location'];
        $restaurant->email=$data['email'];
        $imageName = rand().time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('upload'), $imageName);
        $restaurant->image=$imageName;
        $restaurant->save();
        return redirect('/admin/restaurant/all');
    }
}
