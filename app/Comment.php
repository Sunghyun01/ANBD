<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'anbd_comment';
    protected $primaryKey = 'idx';
    public $timestamps = false;

    protected $fillable = ['pidx','writer','comment','reg_time'];

}
