<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SettingController extends Controller
{
    function editView()
    {
        $user = User::select('idx','id','password','name')->where('idx',1)->first();

        return view('userEdit', ['data'=>$user]);
    }
}
