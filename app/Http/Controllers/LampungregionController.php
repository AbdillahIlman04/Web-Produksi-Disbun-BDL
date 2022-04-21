<?php

namespace App\Http\Controllers;

use App\Models\areaproduksi;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\tahun;
use App\Models\User;


use Illuminate\Http\Request;

class LampungregionController extends Controller
{
    public function search(){

        $regencies = Regency::where('province_id',18)->get();
        $tahuns = tahun::all();
    
        return view('home.index',compact('regencies','tahuns'),[
            "title"=>"Produksi Disbun | Dashboard"
        ]);
    
    }

    public function getkecamatan(request $request){
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id',$id_kabupaten)->get();

        $option = "<option selected hidden>Pilih Kecamatan..</option>";

        foreach($kecamatans as $kecamatan){
            $option.= "<option value='$kecamatan->id'>$kecamatan->name<option>";
        }
        echo $option;
    }


}
