<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Goods,User,Comment};
use Carbon\Carbon;

class GoodsController extends Controller
{
    function goodsList(Request $request)
    {
        $goodsData = Goods::select('idx','goods_name','place','hash','reg_time');
        if($request->has('q')){
            $goodsData->where('goods_name', 'like', '%' . $request->q . '%');
        }
        $goodsData = $goodsData->get();

        return view('goodslist', ['data'=>$goodsData]);
    }
    function getSingleData(Request $request, $idx)
    {
        $goods = Goods::findOrFail($idx);
        $comment =Comment::where('pidx',$idx)->get();
        
        return view('goodsDetail', ['data'=>$goods,'comment'=>$comment]);
    }
    function goodsInsertView()
    {
        if(isset($_COOKIE['user_idx'])){
            return view('goodsInsert');
        }else{
            return abort('403');
        }
    }
    function goodsInsert(Request $request)
    {
        $writer = User::findOrFail($_COOKIE['user_idx'])->name;

        $hash = preg_replace("/\s+/", "", $request->hash);
        $place = preg_replace("/\s+/", "", $request->place);

        $hash = explode(',',$hash);
        $place = explode(',',$place);

        $hashMax = count($hash);
        $placeMax= count($place);

        if($hashMax > 3){
            $hash = $hash[0].','.$hash[1].','.$hash[2];
        }else{
            $hash = implode(',',$hash);
        }
        if($placeMax > 3){
            $place = $place[0].','.$place[1].','.$place[2];
        }else{
            $place = implode(',',$place);
        }
        Goods::create([
            'goods_name' => $request->goods_name,
            'comment' => $request->comment,
            'writer' => $writer,
            'hash' => $hash,
            'place' => $place,
            'reg_time' => now()->timestamp
        ]);

        return redirect()->route('goodsList');
    }
    function comment(Request $request, $idx)
    {
        $writer = User::findOrFail($_COOKIE['user_idx'])->name;
        Comment::create([
            'pidx' => $idx,
            'writer' => $writer,
            'comment' => $request->comment,
            'reg_time' => now()->timestamp
        ]);
        return response()->json(['status'=>true]);
    }
}
