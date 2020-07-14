<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;

class HomeController extends Controller
{
    public function index()
    {
        $goods = Goods::orderBy('reg_time','desc')->limit(6)->get();
        return view('home',['data'=>$goods]);
    }
}
