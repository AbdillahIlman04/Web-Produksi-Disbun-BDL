<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class tahun extends Model
{
    use HasFactory;

    protected $guarded = ['id'];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'district_id'
    ];


    public function district(){
        return $this->hasMany(District::class);
    }
    public function Areaproduksi(){
        return $this->hasOne(areaproduksi::class);
    }
}
