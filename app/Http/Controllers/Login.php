<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Login extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('id',$request->id)->where('password',$request->password)->first();
        if(isset($user)){
            setcookie('user_idx', $user->idx, time() + 86400 * 30);
            return response()->json(['status'=>true]);
        }else{
            return response()->json(['status'=>false,'msg'=>'일치하는 계정이 없습니다']);
        }
    }
    public function logout()
    {
        setcookie("user_idx", "", time() - 3600);
        return redirect()->route('home');
    }
    public function register(Request $request)
    {
        User::create([
            'id' => $request->id,
            'password' => $request->password,
            'name' => $request->name,
            'reg_time' => now()->timestamp
        ]);
        return response()->json(['status'=>true,'msg'=>'가입되었습니다']);
    }
    public function idChk(Request $request)
    {
        $cnt = User::where('id',$request->id)->count();
        if($cnt > 0){
            return response()->json(['status'=>false,'msg'=>'이미 있는 아이디입니다']);
        }else{
            return response()->json(['status'=>true,'msg'=>'사용하실 수 있는 아이디입니다']);
        }
    }
}
