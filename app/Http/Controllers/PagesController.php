<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Restaurant;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function about()
    {
        return view('about');
    }
    public function courses()
    {
        return view('courses');
    }
    public function portfolio()
    {
        return view('portfolio');
    }

    public function contact()
    {
        return view('contact');
    }
    public function allProducts()
    {
        $products=Product::with('get_category')->get();
        return view('allSupplies',compact('products'));
    }
    public function allMeals()
    {
        $meals=Meal::with('get_restaurant')->get();
        return view('allMeals',compact('meals'));
    }
    public function allRestaurants()
    {
        $restaurants=Restaurant::get();
        return view('allRestaurants',compact('restaurants'));
    }
}
