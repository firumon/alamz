<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Record extends Model
{
    protected static function booted()
    {
        if(Auth::user()->role === 'broker'){
            $brokerField = HEAD_FIELD_DISPLAY['BROKER'];
            static::addGlobalScope('my',function (Builder $builder) use($brokerField){
                $builder->where(function($Q)use($brokerField){ $Q->where($brokerField,Auth::user()->name); });
            });
        }/* elseif(Auth::user()->role === 'compliance'){
            $complianceField = HEAD_FIELD_DISPLAY['Compliance'];
            $brokerStatusField = HEAD_FIELD_DISPLAY['Status - Broker'];
            static::addGlobalScope('my',function (Builder $builder) use($complianceField,$brokerStatusField){
                $builder->where(function($Q)use($complianceField,$brokerStatusField){
                    $Q->where(function($Q1)use($complianceField){ $Q1->where($complianceField,Auth::user()->name)->orWhereNull($complianceField); })->where($brokerStatusField,'Submitted')
                        ->orWhere(function($Q2)use($complianceField,$brokerStatusField){ $Q2->where($complianceField,Auth::user()->name)->whereNull($brokerStatusField); })
                    ;
                });
            });
        }*/
    }
}
