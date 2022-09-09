<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
   public function home()
   {
return view('dashboard.index');
   }
}
