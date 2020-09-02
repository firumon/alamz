<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Record;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RecordController extends Controller
{
    public function Broker(){
        if(request()->getMethod() === 'POST'){
            $request = request()->except(['id','item','_token','action']); $type = request('item'); $kebab = Str::kebab($type);
            $ids = request()->filled('records') ? array_unique(array_merge(explode(',',request('records')),[request('id')])) : [request('id')];
            if($ids && !empty($ids)){
                $head = HEAD_FIELD_DISPLAY; $status = $type === 'Make Pending' ? 'Pending' : ($type === 'undo' ? null : 'Submitted'); $file_field = $head['Attachment']; $k_ff = $kebab . '-' . $file_field;
                $fields = [$head['Submit Type'] => $type === 'undo' ? null : $type,$head['Status - Broker'] => $status,$file_field => self::store($k_ff)];
                foreach ($request as $field => $value)
                    if(Str::startsWith($field,$kebab) && $field !== $k_ff)
                        $fields[Str::replaceFirst($kebab.'-','',$field)] = $value;
                if($status === 'Submitted') $fields[$head['Status - Compliance']] = null;
                Record::whereIn('id',$ids)->update($fields);
                self::activity('Broker',$ids,$status || "NULL");
                return redirect()->back()->with(['success' => true]);
            }
        }
        return view('broker.view');
    }
    public function Compliance(){
        if(request()->getMethod() === 'POST'){
            $request = request()->all(); $record = Record::find($request['id']);
            $ids = request()->filled('records') ? array_unique(array_merge(explode(',',request('records')),[request('id')])) : [request('id')];
            if($ids && !empty($ids)){
                $head = HEAD_FIELD_DISPLAY; $status = $request['status']; $note = $request['note'];
                $fields = [$head['Status - Compliance'] => $status, $head['Note - Compliance'] => $note, $head['Compliance'] => Auth::user()->name];
                if($status === 'Incomplete') $fields[$head['Status - Broker']] = null;
                Record::whereIn('id',$ids)->update($fields);
                self::activity('Compliance',$ids,$status);
                return redirect()->back()->with(['success' => true]);
            }
        }
        return view('compliance.view');
    }

    private static function activity($person,$ids,$status){
        Activity::activity("$person changed status of " . (count($ids) > 1 ? (count($ids) . " Records") : "<a href='" . route('detail',[$ids[0]]) . "'>Record " . $ids[0] . "</a>") . " into $status");
    }

    public static function HeadRecords(){
        $records = []; $default = config('alramz.head');
        foreach (config('alramz.head_program') as $type => $fields) $default[$type] = array_merge($default[$type],$fields);
        foreach($default as $fType => $displays){
            foreach ($displays as $number => $display){
                $field = $fType . ($number+1);
                $getType = self::getType($display,$fType);
                $type = is_array($getType) ? $getType[0] : $getType;
                $option = is_array($getType) ? $getType[1] : null;
                $records[] = compact('field','display','type','option');
            }
        }
        return $records;
    }

    public static function getType($display,$type){
        $second = ''; $types = config('alramz.head_type');
        foreach ($types as $lType => $displays){
            if(isset($displays[0])){
                if(in_array($display,$displays)) return $lType;
                if(in_array($type,$displays)) $second = $lType;
            } else {
                if(array_key_exists($display,$displays)) return [$lType,$displays[$display]];
            }
        }
        return $second;
    }

    private static function store($k_ff){
        if(request()->hasFile($k_ff)){
            $file = request()->file($k_ff); $disk = 'attachment';
            $name = $file->hashName();
            if(strpos($name,".") !== false) return $file->store('/',$disk);
            $name .= '.' . $file->getClientOriginalExtension(); return $file->storeAs('/',$name,$disk);
        }
        return null;
    }

}
