<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function add()
   {
       $categories=Category::get();
       return view('Admin.Product.add',compact('categories'));
   }
   public function store(Request $request)
   {
       $data = $request->input();
       $product=new Product;
       $product->name= $data['name'];
       $product->price= $data['price'];
       $product->description= $data['description'];
       $product->category_id=$data['category_id'];
       $imageName = rand().time().'.'.$request->image->getClientOriginalExtension();
       $request->image->move(public_path('upload'), $imageName);
       $product->image=$imageName;
       $product->save();
       return redirect('/admin/product/all');

   }
   public function all()
{
    $products= Product::with('get_category')->get();
    return view('Admin.Product.all',compact('products'));
}
    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        return back();
    }

    public function edit($id){
        $product = Product::find($id);
        $categories=Category::get();
        return view('Admin.Product.edit',compact( 'product','categories'));


    }

    public function update($id, Request $request){
        $data = $request->input();
        $product = Product::find($id);
        $product->name= $data['name'];
        $product->price= $data['price'];
        $product->description= $data['description'];
        $product->category_id=$data['category_id'];
        $imageName = rand().time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('upload'), $imageName);
        $product->image=$imageName;
        $product->save();
        return redirect('/admin/product/all');
    }
}
