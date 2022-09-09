<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function add()
    {
return view('Admin.Location.add');
    }
    public function store(Request $request)
    {
        $location=new Location;
        $data = $request->input();
        $location->name=$data['name'];
        $location->cost=$data['cost'];
        $location->save();
        return redirect('/admin/location/all');
    }
    public function all()
    {
        $locations=Location::get();
        return view('Admin.Location.all',compact('locations'));
    }
    public function edit($id)
    {
$location=Location::find($id);
return view ('Admin.Location.edit',compact('location'));
    }
    public function update($id, Request $request)
    {
        $location=Location::find($id);
        $data = $request->input();
        $location->name=$data['name'];
        $location->cost=$data['cost'];
        $location->save();
        return redirect('/admin/location/all');

    }
    public function delete($id)
    {
        $location = Location::find($id);
        $location->delete();
        return back();
    }
}
