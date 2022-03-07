<?php

namespace App\Http\Controllers;

use App\Models\areaproduksi;
use App\Models\region;
use Illuminate\Http\Request;

class AreaProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = areaproduksi::all();

        $i = 0;
        $sumtm = 0;
        $sumtbm = 0;
        $sumtr = 0;
        $sumHasil = 0;
        $sumproduksi = 0;
        $sumproduktivitas = 0;

        for($i;$i<$areas->count(); $i++){
            $bil1 = $areas[$i]->tm;
            $bil2 = $areas[$i]->tbm;
            $bil3 = $areas[$i]->tr;
            $hasil[$i] = $bil1 + $bil2 + $bil3;
        }
        for($i=0;$i<$areas->count(); $i++){
            $bil1 = $areas[$i]->tm;
            $sumtm = $bil1+$sumtm;
        }
        for($i=0;$i<$areas->count(); $i++){
            $bil1 = $areas[$i]->tbm;
            $sumtbm = $bil1+$sumtbm;
        }
        for($i=0;$i<$areas->count(); $i++){
            $bil1 = $areas[$i]->tr;
            $sumtr = $bil1+$sumtr;
        }
        for($i=0;$i<$areas->count(); $i++){
            $bil1 = $areas[$i]->produksi;
            $sumproduksi = $bil1+$sumproduksi;
        }
        for($i=0;$i<$areas->count(); $i++){
            $bil1 = $areas[$i]->produktivitas;
            $sumproduktivitas = $bil1+$sumproduktivitas;
        }

        for($i=0;$i<$areas->count(); $i++){
            $sumHasil = $hasil[$i] + $sumHasil;
        }

    
        return view('admin.index',compact('areas','hasil','sumtm','sumtbm','sumtr','sumproduksi','sumproduktivitas', 'sumHasil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new areaproduksi();
        return view('admin.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'komoditi'=> 'required',
            'tm'=> 'required',
            'tbm'=> 'required',
            'tr'=> 'required',
            'produksi'=> 'required',
            'produktivitas'=> 'required',
            'bentuk_hasil'=> 'required',
        ]);

        $model = new areaproduksi();

        $model->komoditi = $request->input('komoditi');
        $model->tm = $request->input('tm');
        $model->tbm = $request->input('tbm');
        $model->tr = $request->input('tr');
        $model->produksi = $request->input('produksi');
        $model->produktivitas = $request->input('produktivitas');
        $model->bentuk_hasil = $request->input('bentuk_hasil');

        $model->save();

        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\areaproduksi  $areaproduksi
     * @return \Illuminate\Http\Response
     */
    public function show(areaproduksi $areaproduksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\areaproduksi  $areaproduksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if($request->isMethod('post')){
        //     $data = $request->all();

        //     areaproduksi::where(['id'=>$id])->update([
        //         'komoditi'=>$data['komoditi'],
        //         'tm'=>$data['tm'],
        //         'tbm'=>$data['tbm'],
        //         'tr'=>$data['tr'],
        //         'produksi'=>$data['produksi'],
        //         'produktivitas'=>$data['produktivitas'],
        //         'bentuk_hasil'=>$data['bentuk_hasil']
        //     ]);
        //     return redirect('admin');
        // }
        $data = areaproduksi::find($id);
        return view('admin.index',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\areaproduksi  $areaproduksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data=areaproduksi::find($id);
        $data->tm = $request->tm;
        $data->tbm = $request->tbm;
        $data->tr = $request->tr;
        $data->produksi = $request->produksi;
        $data->produktivitas = $request-> produkstivitas;
        $data->bentuk_hasil = $request-> bentuk_hasil;

        $data->save();

        return redirect('admin')->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\areaproduksi  $areaproduksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=areaproduksi::find($id);
        $data->delete();
        return redirect('admin.index');

    }
}
