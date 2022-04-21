<?php

namespace Database\Seeders;

use App\Models\areaproduksi;
use App\Models\region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\tahun;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name'  => 'Admin Produksi',
            'email' => 'adminproduksi@gmail.com',
            'password' => bcrypt('admin123')
        ]);

        tahun::create([
            'year'=> '2015',
            'tahun_id'=> '5'
        ]);
        tahun::create([
            'year'=> '2016',
            'tahun_id'=> '6'
        ]);
        tahun::create([
            'year'=> '2017',
            'tahun_id'=> '7'
        ]);
        tahun::create([
            'year'=> '2018',
            'tahun_id'=> '8'
        ]);
        tahun::create([
            'year'=> '2019',
            'tahun_id'=> '9'
        ]);
        tahun::create([
            'year'=> '2020',
            'tahun_id'=> '10'
        ]);
        tahun::create([
            'year'=> '2021',
            'tahun_id'=> '11'
        ]);
        tahun::create([
            'year'=> '2022',
            'tahun_id'=> '12'
        ]);
        // region::create([
        //     'kabupaten_id'=>'1802',
        //     'kecamatan_id'=>'1802031',
        //     'tahun'=>'2019'
        // ]);
        areaproduksi::create([
            'komoditi'=>'Kelapa',
            // 'areaproduksi_id' => '1',
            'tm'=>'9',
            'tbm'=>'5',
            'tr'=>'4',
            'produksi'=>'12',
            'produktivitas'=>'20',
            'jml_petani'=>'15',
            'bentuk_hasil'=>'Kopra'
        ]);


    }
}
