<?php

use App\Models\Lga;
use App\Models\Ward;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('lga_id')->nullable();
            $table->timestamps();

            $table->foreign('lga_id')
            ->references('id')
            ->on('lgas')
            ->onDelete('cascade');
        });

        $local_govts = ["amuwo", "alaka", "festac", "iba", "ijaye", "apapa", "ijegun", "ibeshe", "mafoluku", "ikoyi"];
        foreach($local_govts as $locals){
            $lga = Lga::inRandomOrder()->first();
            Ward::create([
                "lga_id" => $lga->id,
                "name" =>$locals,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wards');
    }
}
