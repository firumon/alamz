<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Activity extends Model
{
    protected $guarded = [];


    public static function activity($activity){
        self::create(['activity' => $activity, 'user' => Auth::user()->name]);
    }
}
