<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AjaxDemoController extends Controller
{
    public function myform()
    {
        $countries = DB::table('countries')->pluck("name", "id")->all();
        return view('myform', compact('countries'));
    }

    public function selectAjax(Request $r)
    {
        if($r->ajax()){
            $states = DB::table('states')->where('id_country', $r->id_country)->pluck("name", "id")->all();
            $data = view('ajax-select', compact('states'))->render();
            return response()->json(['options' => $data]);
        }
    }

    public function selectDistrict(Request $r)
    {
        if($r->ajax()){
            $districts = DB::table('districts')->where('id_state', $r->id_state)->pluck("name", "id")->all();
            $data = view('district-select', compact('districts'))->render();
            return response()->json(['options' => $data]);
        }
    }
}
