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

function recordsBetween($start,$end){
    $field = headValues(config('alramz.report.on'));
    $format = config('alramz.report.format');
    $condRaw = \Illuminate\Support\Facades\DB::raw("STR_TO_DATE(`$field`,'$format')");
    $selRaw = \Illuminate\Support\Facades\DB::raw("STR_TO_DATE(`$field`,'$format') c_date");
    return \App\Record::select(['*',$selRaw])->where($condRaw,'>=',$start)->where($condRaw,'<=',$end)->get();
}

function statusCount($items){
    $pending = $items->count(); $rejected = 0;
    return collect(config('alramz.options.ComplianceStatus'))->mapWithKeys(function($status)use($items,&$pending,&$rejected){
        $count = $items->where(headValues('Status - Compliance'),$status)->count();
        $pending -= $count; if($status === 'Rejected') $rejected = $count;
        return [$status => $count];
    })->merge(['Records to be submitted' => $pending,'Clearance' => ($pending + intval($rejected) > 0) ? 1 : 0]);
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
