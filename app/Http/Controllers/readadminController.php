<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regency;
use App\Models\District;
use App\Models\tahun;
use App\Models\User;
use App\Models\areaproduksi;

class readadminController extends Controller
{
    public function index(){
        
        // $data = areaproduksi::find($id);

        // $i = 0;
        // $sumtm = 0;
        // $sumtbm = 0;
        // $sumtr = 0;
        // $sumHasil = 0;
        // $sumproduksi = 0;
        // $sumproduktivitas = 0;

        // $sumJumlah = $data->tm + $data->tbm + $data->tr;
        // dd($sumJumlah);



        $data = areaproduksi::all();
        $i = 0;
        $sumtm = 0;
        $sumtbm = 0;
        $sumtr = 0;
        $sumHasil = 0;
        $sumproduksi = 0;
        $sumproduktivitas = 0;

        for($i;$i<$data->count(); $i++){
            $bil1 = $data[$i]->tm;
            $bil2 = $data[$i]->tbm;
            $bil3 = $data[$i]->tr;
            $hasil[$i] = $bil1 + $bil2 + $bil3;
        }
        for($i=0;$i<$data->count(); $i++){
            $bil1 = $data[$i]->tm;
            $sumtm = $bil1+$sumtm;
        }
        for($i=0;$i<$data->count(); $i++){
            $bil1 = $data[$i]->tbm;
            $sumtbm = $bil1+$sumtbm;
        }
        for($i=0;$i<$data->count(); $i++){
            $bil1 = $data[$i]->tr;
            $sumtr = $bil1+$sumtr;
        }
        for($i=0;$i<$data->count(); $i++){
            $bil1 = $data[$i]->produksi;
            $sumproduksi = $bil1+$sumproduksi;
        }
        for($i=0;$i<$data->count(); $i++){
            $bil1 = $data[$i]->produktivitas;
            $sumproduktivitas = $bil1+$sumproduktivitas;
        }

        for($i=0;$i<$data->count(); $i++){
            $sumHasil = $hasil[$i] + $sumHasil;
        }

    
        return view('admin.index',compact('data','hasil','sumtm','sumtbm','sumtr','sumproduksi','sumproduktivitas', 'sumHasil' ),[
            "active" => "Admin", 
            "title" => "Produksi Disbun | Admin", 
        ]);
    }

    public function detail($id){
        $detail = [
            'data'=>$this->areaproduksi->detailData($id),
        ];
        return view('admin.index',$detail);
    }

    public function insertdata (Request $request){
        // dd($request->all());
        areaproduksi::create($request->all());
        return redirect()->route('admin');
    }

    public function searching(Request $request){
    //  $search = areaproduksi::with('Tahun','district','regency')->where()
    }

    public function edit(Request $request,$id){
        if($request->isMethod('post')){
            $data = $request->all();

            areaproduksi::where(['id'=>$id])->update([
                'komoditi'=>$data['komoditi'],
                'tm'=>$data['tm'],
                'tbm'=>$data['tbm'],
                'tr'=>$data['tr'],
                'produksi'=>$data['produksi'],
                'produktivitas'=>$data['produktivitas'],
                'bentuk_hasil'=>$data['bentuk_hasil']
            ]);
            return redirect('admin');
        }
        // $data = areaproduksi::find($id);
        // return view('admin.index',compact('data'));
    }

    // public function edit($id){
    //     $data = areaproduksi::find($id);
    //     return response()->json([
    //         'status'=> 200,
    //         'data'=>$data,
    //     ]);
    // }

    public function delete($id){
        $data=areaproduksi::find($id);
        $data->delete();

        return redirect()->route('admin');
    }
    // public function delete($id=null){
    //     areaproduksi::where(['id'=>$id])->delete();
    //     return redirect()->route('admin')->with('flash_message_success', 'Delete Berhasil');
    // }
}
