<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function add()
    {
        $restaurants=Restaurant::get();
        return view('Admin.Meal.add',compact('restaurants'));
    }
    public function store(Request $request)
    {
        $meal=new Meal;
        $data = $request->input();
        $meal->name=$data['name'];
        $imageName = rand().time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('upload'), $imageName);
        $meal->image=$imageName;
        $meal->ingredients= $data['ingredients'];
        $meal->price= $data['price'];
        $meal->restaurant_id= $data['restaurant_id'];
       $meal->save();
        return redirect('/admin/meal/all');

    }
    public function all()
    {
        $meals=Meal::with('get_restaurant')->get();
        return view('Admin.Meal.all',compact('meals'));
    }
    public function delete($id){
        $meal = Meal::find($id);
        $meal->delete();
        return back();
    }

    public function edit($id){
        $meal = Meal::find($id);
        $restaurants=Restaurant::get();
        return view('Admin.Meal.edit',compact( 'meal','restaurants'));
    }

    public function update($id, Request $request){
        $data = $request->input();
        $meal = Meal::find($id);
        $meal->name=$data['name'];
        $imageName = rand().time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('upload'), $imageName);
        $meal->image=$imageName;
        $meal->ingredients= $data['ingredients'];
        $meal->price= $data['price'];
        $meal->restaurant_id= $data['restaurant_id'];
        $meal->save();
        return redirect('/admin/meal/all');
    }
}
