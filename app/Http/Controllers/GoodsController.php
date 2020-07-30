<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Goods,User,Comment};
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class GoodsController extends Controller
{
    function goodsList(Request $request)
    {
        $goodsData = Goods::select('idx','goods_name','comment','img','writer','place',
        'department','grade','gubun','day','post_type','start_time','end_time','reg_time');
        if($request->has('q')){
            $goodsData->where('goods_name', 'like', '%' . $request->q . '%');
        }
        if($request->has('u')){
            $goodsData->where('writer', 'like', '%' . $request->u . '%');
        }
        if($request->has('department')){
            $goodsData->where('department',$request->department);
        }
        if($request->has('grade')){
            $goodsData->where('grade',$request->grade);
        }
        if($request->has('gubun')){
            $goodsData->where('gubun',$request->gubun);
        }
        if($request->has('post_type')){
            $goodsData->whereIn('post_type',[$request->post_type,2]);
        }
        if($request->has('grade')){
            $goodsData->where('grade',$request->grade);
        }
        $goodsData = $goodsData->orderBy('reg_time','desc')->get();

        return view('goodslist', ['data'=>$goodsData]);
    }
    function getSingleData(Request $request, $idx)
    {
        $goods = Goods::findOrFail($idx);
        $comment =Comment::where('pidx',$idx)->get();

        if(isset($goods->gubun) && $goods->gubun != ''){
            $goods->gubun = Goods::$gubun[$goods->gubun];
        }
        if(isset($goods->department) && $goods->department != ''){
            $goods->department = Goods::$department[$goods->department];
        }

        if(isset($goods->day) && $goods->day!= ''){
            $exp = explode('|',$goods->day);
            $day = '';
            for($i=0; $i<count($exp); $i++){
                $day .= Goods::$day[$exp[$i]].' ';
            }
            $goods->day = trim($day);
        }


        return view('goodsDetail', ['data'=>$goods,'comment'=>$comment,'user']);
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
        $writer = User::findOrFail(Crypt::decryptString($_COOKIE['user_idx']))->id;

        $place = preg_replace("/\s+/", "", $request->place);

        $place = explode(',',$place);

        $placeMax= count($place);

        if($placeMax > 3){
            $place = $place[0].','.$place[1].','.$place[2];
        }else{
            $place = implode(',',$place);
        }

        $day = implode('|',$request->day);
        if(count($request->post_type) == 2){
            $post_type = 2;
        }elseif (count($request->post_type) == 1) {
            $post_type = $request->post_type[0];
        }else {
            $post_type = 3;
        }

        $name = '';
        if($request->hasFile('goods_photo')){
            $image = $request->file('goods_photo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $name = '/images/'.$name;
        }
        Goods::create([
            'goods_name' => $request->goods_name,
            'comment' => $request->comment,
            'img' => $name,
            'writer' => $writer,
            'gubun' => $request->gubun,
            'post_type' => $post_type,
            'department' => $request->department,
            'grade'=>$request->grade,
            'place'=>$place,
            'day' => $day,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'reg_time' => now()->timestamp
        ]);

        return redirect()->route('home');
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
        return response()->json(['status'=>true,'writer'=>$writer]);
    }
}
