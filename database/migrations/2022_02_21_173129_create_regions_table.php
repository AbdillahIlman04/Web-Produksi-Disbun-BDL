<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kabupaten_id',4);
            $table->char('kecamatan_id',7);
            $table->char('tahun',7);
            $table->timestamps();
    
      
        });
        Schema::table('regions', function (Blueprint $table) {
            $table->foreign('kabupaten_id')->references('id')->on('regencies')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('kecamatan_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
    }
};
