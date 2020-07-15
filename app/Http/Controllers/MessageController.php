<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Message,User};

class MessageController extends Controller
{
    function getMessage(Request $request)
    {
        if(isset($_COOKIE['user_idx'])){
            $user =  User::select('idx','id','password','name')->where('idx',$_COOKIE['user_idx'])->first();
            $msg = Message::select('idx','post_id','get_id','message','reg_time')->where('get_id',$user->id)->get();
            $msg = $msg->groupBy('post_id');
            return view('message',['data'=>$msg]);
        }else{
            return view('message');
        }
    }
    function messageDetail($send)
    {
        $user =  User::select('idx','id','password','name')->where('idx',$_COOKIE['user_idx'])->first();
        $postName = User::select('idx','id','password','name')->where('id',$send)->first();

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
}
