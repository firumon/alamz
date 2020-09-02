<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Head extends Model
{
    protected static function booted()
    {
        static::saved(function($model){
            $keys = ['head','broker_field','compliance_field','broker_status_field'];
            foreach($keys as $key) cache()->forget($key);
        });
    }
}
