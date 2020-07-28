<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'anbd_goods';
    protected $primaryKey = 'idx';
    public $timestamps = false;

    protected $fillable = ['idx','pidx','goods_name','comment','img','writer','hash','place',
    'department','grade','gubun','post_type','day','start_time','end_time','reg_time'];
    public static $department = [
        '국어국문학과','영어영문학과','중어중문학과','프랑스언어문화학과','일본학과','법학과','행정학과','경제학과'
        ,'경영학과','무역학과','미디어영상학과','관광학과','사회복지학과','농학과','생활과학부','컴퓨터과학과','정보통계학과'
        ,'보건환경학과','간호학과','교육학과','청소년교육과','유아교육과','문화교양학과'
    ];
    public static $gubun = [
        '전공','교양','일반'
    ];
    public static $day=[
        'mon'=>'월요일',
        'tue'=>'화요일',
        'wed'=>'수요일',
        'thu'=>'목요일',
        'fri'=>'금요일',
        'sat'=>'토요일',
        'sun'=>'일요일'
    ];
}
