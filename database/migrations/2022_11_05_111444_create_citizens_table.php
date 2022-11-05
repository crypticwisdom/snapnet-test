<?php

use App\Models\Citizen;
use App\Models\Ward;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('address');
            $table->string('phone');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->unsignedBigInteger('ward_id')->nullable();
            $table->timestamps();

            $table->foreign('ward_id')
            ->references('id')
            ->on('wards')
            ->onDelete('cascade');
        });

        $local_govts = ["amuwo", "alaka", "festac", "iba", "ijaye", "apapa", "ijegun", "ibeshe", "mafoluku", "ikoyi"];
        $wards = Ward::all();
        Citizen::insert([
            [
                "full_name" => "Ajayi Bembe",
                "address" => "2, isiaka lane",
                "phone" => "1234567890",
                "gender" => "female",
                "ward_id" => $wards[0]->id,
            ],
            [
                "full_name" => "micheal jordan",
                "address" => "3, ishola lane",
                "phone" => "6789012345",
                "gender" => "male",
                "ward_id" => $wards[1]->id,
            ],
            [
                "full_name" => "Isiaka Ishola",
                "address" => "20, lekki road",
                "phone" => "1929567890",
                "gender" => "male",
                "ward_id" => $wards[2]->id,
            ],
            [
                "full_name" => "Adeleke BeIdowumbe",
                "address" => "2, osbone estate",
                "phone" => "1234567890",
                "gender" => "female",
                "ward_id" => $wards[3]->id,
            ],
            [
                "full_name" => "Lincon Burrows",
                "address" => "56, packview estate",
                "phone" => "8739274294",
                "gender" => "male",
                "ward_id" => $wards[4]->id,
            ],
            [
                "full_name" => "Sara Tencredi",
                "address" => "5, Elegushi road",
                "phone" => "1234567890",
                "gender" => "female",
                "ward_id" => $wards[5]->id,
            ],
            [
                "full_name" => "Theodore Bagwell",
                "address" => "89, isiaka lane",
                "phone" => "1234567890",
                "gender" => "male",
                "ward_id" => $wards[6]->id,
            ],
            [
                "full_name" => "Fenando Sucre",
                "address" => "2, Yaba street",
                "phone" => "7826764220",
                "gender" => "male",
                "ward_id" => $wards[7]->id,
            ],
            [
                "full_name" => "Alexander Manhon",
                "address" => "FBI road illinios",
                "phone" => "98765432",
                "gender" => "male",
                "ward_id" => $wards[8]->id,
            ],
            [
                "full_name" => "Micheal Scofield",
                "address" => "45, Banana Estate",
                "phone" => "1234567890",
                "gender" => "male",
                "ward_id" => $wards[9]->id,
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citizens');
    }
}
