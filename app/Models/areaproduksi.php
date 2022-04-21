<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Regency;
use App\Models\tahun;
use App\Models\District;
use Illuminate\Support\Facades\DB as FacadesDB;

class areaproduksi extends Model
{
    use HasFactory;

    protected $table = 'areaproduksis';
    protected $guarded = [];

    public function detailData($id){
        return DB::table('areaproduksis')->where('id',$id)->first();
    }
    public function area(){
        return $this->hasOne(region::class,'areaproduksi_id','id');
    }

    


}
