<?php

namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{
    public function preview(Request $request){
        $fields = self::select($request->input('field'));
        $records = Record::select(DB::raw($fields));

        $where = self::where($request->except(['field','_token','action']));
        if(!empty($where)){
            foreach ($where as $field => $values)
                $records->whereIn($field,$values);
        }
        return view('preview',['records' => $records->get()->toArray()]);
    }

    public static function select($fields){
        $flipped = Arr::only(array_flip(HEAD_FIELD_DISPLAY),$fields);
        $select = array_map(function($key,$value){ return "`$key` as '$value'"; },array_keys($flipped),array_values($flipped));
        return implode(', ',$select);
    }

    public static function where($data){
        $where = [];
        foreach ($data as $field => $values) {
            if (!empty($values) && is_array($values) && !is_null($values[0])) $where[$field] = $values;
        }
        return $where;
    }
}
