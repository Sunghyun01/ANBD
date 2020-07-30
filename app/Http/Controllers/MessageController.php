<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\{Message,User};

class MessageController extends Controller
{
    function getMessage(Request $request)
    {
        if(isset($_COOKIE['user_idx'])){
            $user =  User::select('idx','id','password','name')->where('idx',Crypt::decryptString($_COOKIE['user_idx']))->first();
            $msg = Message::select('idx','post_id','get_id','message','reg_time')->where('get_id',$user->id)->get();
            $msg = $msg->groupBy('post_id');

            $up = Message::where('get_id',$user->id)->where('see','1')->get();
            $val = '';
            foreach ($up as $value) {
                $val .= $value->post_id.',';
            }
            $val = substr($val, 0, -1);
            return view('message',['data'=>$msg,'no'=>$up = $val]);
        }else{
            return view('message');
        }
    }
    function messageDetail($send)
    {
        $user =  User::select('idx','id','password','name')->where('idx',Crypt::decryptString($_COOKIE['user_idx']))->first();
        $postName = User::select('idx','id','password','name')->where('id',$send)->first();

        $up = Message::where('get_id',$user->id)->where('post_id',$send)->where('see','1')->update(['see'=>'0']);

        $msg = Message::select('idx','post_id','get_id','message','reg_time')
        ->whereIn('post_id',[$send,$user->id])
        ->whereIn('get_id',[$send,$user->id])
        ->orderBy('reg_time','asc')
        ->get();

        return view('messagedetail',['data'=>$msg,'postName'=>$postName->name,'getName'=>$user->name,'pid'=>$send,'gid'=>$user->id]);
    }
    function send(Request $request)
    {
        Message::create([
            'post_id'=>$request->post_id,
            'get_id'=>$request->get_id,
            'message'=>$request->msg,
            'reg_time'=>now()->timestamp
        ]);

        return response()->json(['status'=>true]);
    }
    function chkMsg(){
        $user =  User::select('idx','id','password','name')->where('idx',Crypt::decryptString($_COOKIE['user_idx']))->first();
        $msg = Message::where('see','1')->where('get_id',$user->id)->orderBy('reg_time','desc')->count();

        if($msg > 0){
            return response()->json(['status'=>true,'msg'=>$msg]);
        }else{
            return response()->json(['status'=>false]);
        }
    }
}
