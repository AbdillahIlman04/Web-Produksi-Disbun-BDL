<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use AzisHapidin\IndoRegion\Traits\DistrictTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Regency;
use App\Models\tahun;

/**
 * District Model.
 */
class District extends Model
{
    use DistrictTrait;

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'districts';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'regency_id'
    ];

    /**
     * District belongs to Regency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function Areaproduksi(){
        return $this->belongsTo(areaproduksi::class);
    }
    public function district(){
        return $this->belongsTo(region::class,'kecamatan_id','id');
    }

    /**
     * District has many villages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Tahun()
    {
        return $this->hasMany(tahun::class);
    }
}
