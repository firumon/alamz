<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ImportController extends Controller
{
    public function start(){
        $records = []; $fields = []; $head = [];
        if(request()->getMethod() === 'POST'){
            if(request('action') === 'Load Data'){
                $records = $this->requestToRecords();
                $fields = Arr::pluck(RecordController::HeadRecords(),'field','display');
                $head = array_shift($records);
            } else {
                $created_at = $updated_at = now()->toDateTimeString(); $tz = compact('created_at','updated_at');
                $insert = array_map(function($record)use($tz){ return array_merge($record,$tz); },request('data'));
                Record::insert($insert);
                Activity::activity(count($insert) . " records imported!");
                return redirect()->back()->with(['success' => count($insert)]);
            }
        }
        return view('admin.import',compact('records','fields','head'));
    }

    public function requestToRecords(){
        $data = request('data'); $records = [];
        foreach (explode("\n",$data) as $record) $records[] = array_map('trim',explode("\t",$record));
        return $records;
    }
}
