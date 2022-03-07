<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    use HasFactory;

    protected $table = 'regions';

    protected $guarded = ['id'];

    public function regency(){
        return $this->belongsTo(Regency::class, 'kabupaten_id','id');
    }
    public function district(){
        return $this->belongsTo(District::class, 'kecamatan_id','id');
    }
}
