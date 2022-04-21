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
        Schema::create('areaproduksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->foreignId('areaproduksi_id')->constrained();
            $table->string('komoditi');
            $table->double('tm');
            $table->double('tbm');
            $table->double('tr');
            $table->double('produksi');
            $table->double('produktivitas');
            $table->double('jml_petani');
            $table->string('bentuk_hasil');
            $table->timestamps();
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areaproduksis');
    }
};
