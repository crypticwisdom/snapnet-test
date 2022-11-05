<?php

use App\Models\State;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        State::insert([
            [
                "name" => "lagos"
            ],
            [
                "name" => "Ogun"
            ],
            [
                "name" => "Oyo"
            ],
            [
                "name" => "Ekiti"
            ],
            [
                "name" => "Edo"
            ],
            [
                "name" => "Abuja"
            ],
            [
                "name" => "Kwara"
            ],
            [
                "name" => "Kaduna"
            ],
            [
                "name" => "Kano"
            ],
            [
                "name" => "Sokoto"
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
        Schema::dropIfExists('states');
    }
}
