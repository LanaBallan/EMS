<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function create(Request $request){


            $request->validate(['name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],]);
            $admin=new Admin();
            $admin->name=$request->name;
            $admin->email=$request->email;
            $admin->password= Hash::make($request->password);
            $save=$admin->save();

if($save)
{
    return redirect()->back()->with('Success','You Are Registered');
}
else
{
    return redirect()->back()->with('Fail','Something Went Wrong');
}

    }
    public function logout()
    {
        Auth::guard('manager')->logout();
        return redirect()->route('admin.login');
    }
}
