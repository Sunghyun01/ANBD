<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SettingController extends Controller
{
    function editView(Request $request)
    {
        if(isset($_COOKIE['user_idx'])){
            $user = User::select('idx','id','password','name')->where('idx',$_COOKIE['user_idx'])->first();
            return view('userEdit', ['data'=>$user]);
        }else{
            return view('userEdit');
        }
    }
}
