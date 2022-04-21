<?php

namespace App\Http\Controllers;

use App\Models\region;
use App\Models\Regency;
use App\Models\District;
use App\Models\tahun;
use Illuminate\Http\Request;

class RegionController extends Controller
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
        // $lampung = region::with('regency')->get();
        $lampung = region::all();

        // for($i=0;$i<$lampung->count(); $i++){
        //     $kabupaten = $lampung[$i]->kabupaten_id;
        // }

        // $getkabupaten = Regency::where('id',$kabupaten)->with('regency')->get('name');
        
        // for($i=0;$i<$lampung->count(); $i++){
        //     $kecamatan = $lampung[$i]->kecamatan_id;
        // }
        // $getkecamatan = District::where('id',$kecamatan)->with('district')->get('name');
        

        for($i=0;$i<$lampung->count(); $i++){
            $tahunn = $lampung[$i]->tahun;
        }

        return view('admin.region',compact('regencies','tahuns','lampung'),[

            "title"=>"Produksi Disbun | Region"
        ]);
    }

    public function getkecamatans(request $request){
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id',$id_kabupaten)->with('district')->get(['name','id']);

        $option = "<option selected hidden >Pilih Kecamatan..</option>";

        foreach($kecamatans as $modalkecamatan){
            $option.= "<option value='$modalkecamatan->id'>$modalkecamatan->name</option>";
        }
        echo $option;
      
    }
    public function modalgetkecamatan(request $request){
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id',$id_kabupaten)->with('district')->get(['name','id']);

        $option = "<option selected hidden >Pilih Kecamatan..</option>";

        foreach($kecamatans as $modalkecamatan){
            $option.= "<option value='$modalkecamatan->id'>$modalkecamatan->name</option>";
        }

        return response()->json([
            'data' => $option,
            'id' => $request->id_region
        ]);
    }
    public function updatemodalgetkecamatan(request $request){
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id',$id_kabupaten)->with('district')->get(['name','id']);

        $option = "<option selected hidden >Pilih Kecamatan..</option>";

        foreach($kecamatans as $updatemodalkecamatan){
            $option.= "<option value='$updatemodalkecamatan->id'>$updatemodalkecamatan->name</option>";
        }
        
        return response()->json([
            'data' => $option,
            'id' => $request->id_item
        ]);
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
     * @param  \App\Models\region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(region $region)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lampung = region::find($id);
        return view('admin.index',compact('lampung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            region::where(['id'=>$id])->update([
                'kabupaten_id'=>$data['updatekabupaten_id'],
                'kecamatan_id'=>$data['updatekecamatan_id'],
                'tahun'=>$data['tahun'],
                
            ]);
            return redirect()->route('region');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=region::find($id);
        $data->delete();

        return redirect()->route('region');
    }

    public function search($id){
        $data = region::where("kecamatan",$id)->get();
        return redirect()->route('region',compact('data'));
    }
}
