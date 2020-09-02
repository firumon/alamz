<?php

function records($num,$conditions = [],$gScope = true){
    $query = $gScope ? \App\Record::latest() : \App\Record::withoutGlobalScopes()->latest();
    if(!empty($conditions)) $query = $query->where(headValues($conditions,'keys'));
    if(request()->search_text){
        $search = "%" .(request()->search_text). "%";
        $query = $query->where(function($Q)use($search){ for($i = 1; $i <= config('alramz.migrate.index'); $i++) $Q->orWhere('index' . $i,'like',$search); });
    }
    $records = $query->paginate($num);
    $links = $records->withQueryString()->links();
    return compact('records','links');
}

function headValues($item,$type = 'string'){
    switch ($type){
        case 'string':
            return HEAD_FIELD_DISPLAY[$item];
            break;
        case 'array':
            return array_map(function($i){ return HEAD_FIELD_DISPLAY[$i]; },$item);
            break;
        case 'keys':
            return collect($item)->mapWithKeys(function($data,$key){ return [HEAD_FIELD_DISPLAY[$key] => $data]; })->toArray();
            break;
        case 'values':
            return collect($item)->mapWithKeys(function($data,$key){ return [$key => headValues($data,gettype($data))]; })->toArray();
            break;
        default:
            return $item;
            break;
    }
}
