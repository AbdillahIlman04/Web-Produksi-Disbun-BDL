<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\District;
use App\Models\Regency;
use App\Models\region;
use App\Models\tahun;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regencies = Regency::where('province_id',18)->get();
        $tahuns = tahun::all();
        $lampung = region::all();

        for($i=0;$i<$lampung->count(); $i++){
            $kabupaten = $lampung[$i]->kabupaten;
        }

        for($i=0;$i<$lampung->count(); $i++){
            $tahunn = $lampung[$i]->tahun;
        }

        $getkabupaten = Regency::where('id',$kabupaten)->get('name');
        
        for($i=0;$i<$lampung->count(); $i++){
            $kecamatan = $lampung[$i]->kecamatan;
        }
        $getkecamatan = District::where('id',$kecamatan)->get('name');


        return view('admin.region',compact('regencies','tahuns','lampung','getkabupaten','getkecamatan','tahunn'));
    }

    public function getkecamatan(request $request){
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id',$id_kabupaten)->get('name');

        $option = "<option >Pilih Kecamatan..</option>";

        foreach($kecamatans as $kecamatan){
            $option.= "<option value='$kecamatan->id'>$kecamatan->name<option>";
        }
        echo $option;
    }
    public function modalgetkecamatan(request $request){
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id',$id_kabupaten)->get();

        $option = "<option >Pilih Kecamatan..</option>";

        foreach($kecamatans as $modalkecamatan){
            $option.= "<option value='$modalkecamatan->id'>$modalkecamatan->name<option>";
        }
        echo $option;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        region::create($request->all());
        return redirect()->route('region');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminModel  $adminModel
     * @return \Illuminate\Http\Response
     */
    public function show(AdminModel $adminModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminModel  $adminModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminModel $adminModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminModel  $adminModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminModel $adminModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminModel  $adminModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminModel $adminModel)
    {
        //
    }
}
