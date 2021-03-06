<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Crypt;

class SettingController extends Controller
{
    function index()
    {
        if(isset($_COOKIE['user_idx'])){
            $user = User::select('idx','id','password','name')->where('idx',Crypt::decryptString($_COOKIE['user_idx']))->first();
            return view('setting', ['data'=>$user]);
        }else{
            return view('setting');
        }
    }
    function editView(Request $request)
    {
        if(isset($_COOKIE['user_idx'])){
            $user = User::select('idx','id','password','name')->where('idx',Crypt::decryptString($_COOKIE['user_idx']))->first();
            return view('userEdit', ['data'=>$user]);
        }else{
            return view('userEdit');
        }
    }
}
