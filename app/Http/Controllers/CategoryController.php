<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add()
    {
        return view ('Admin.Category.add');
    }
    public function store(Request $request)
    {
        $data = $request->input();
        $category=new Category;
        $category->name=$data['name'];
        $category->save();
        return redirect('/admin/category/all');
    }
    public function all()
{
    $categories=Category::get();
    return view('Admin.Category.all',compact('categories'));
}
    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return back();
    }

    public function edit($id){
        $category = Category::find($id);
        return view('Admin.Category.edit',compact( 'category'));


    }

    public function update($id, Request $request){
        $data = $request->input();
        $category = Category::find($id);
        $category->name= $data['name'];

        $category->save();
        return redirect('/admin/category/all');
    }
}
