<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'anbd_user';
    protected $primaryKey = 'idx';
    public $timestamps = false;
}