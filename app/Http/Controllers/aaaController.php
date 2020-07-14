<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class aaaController extends Controller
{
	public function aaaList()
   {
    //   dd('123');
		return view('message');
	}
}
