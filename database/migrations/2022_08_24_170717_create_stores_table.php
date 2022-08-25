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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address_code')->comment('郵便番号');
            $table->foreignId('area_id');
            $table->string('city')->comment('市区町村');
            $table->string('address')->comment('それ以降');
            $table->Time('open_time');
            $table->Time('close_time');
            $table->Time('reserve_limit');
            $table->foreignId('genre_id');
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
        Schema::dropIfExists('stores');
    }
};
