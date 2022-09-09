<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function Adminvalidation(Request $request)
    {

        return Validator::make($request->all(),[
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string','ends_with:@admin.com', ' max:255', 'unique:admins'],
            'password' => ['required','string','min:8','confirmed'],
            'phone' => ['required','min:10','max:10']
        ]);
    }
    public function create(Request $request){
        $validator =$this->Adminvalidation($request);
        if($validator->fails())
        {
            $request->validate(
                ['f_name' => ['required', 'string', 'max:255'],
                    'l_name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'phone' => ['required','min:10','max:10']
                ]);
            $user=new User();
            $user->f_name=$request->f_name;
            $user->l_name=$request->l_name;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->password= Hash::make($request->password);
            $save=$user->save();

            if($save)
            {
                Auth::loginUsingId( $user->id);
                return redirect("/");
            }
            else
            {
                return redirect()->back()->with('Fail','Something Went Wrong');
            }

        }
         else{
    $admin=new Admin();
    $admin->f_name=$request->f_name;
    $admin->l_name=$request->l_name;
    $admin->phone=$request->phone;
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

    }
    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }

}
