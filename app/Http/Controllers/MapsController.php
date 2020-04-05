<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maps;

class MapsController extends Controller
{
    //
    public function index(){
        $data['points'] = json_encode($this->getAllMapsData());
        return view('map', $data);
    }

    public function getAllMapsData($kat='semua'){
        if($kat!='semua'){
            $split_kat = explode(',', $kat);
            $points = Maps::whereIn('kategori', $split_kat)->get();
        }else{
            $points = Maps::all();
        }
        return $points;
    }
}
