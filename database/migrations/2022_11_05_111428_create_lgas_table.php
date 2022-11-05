<?php

use App\Models\Lga;
use App\Models\State;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLgasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lgas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('state_id')->nullable();
            $table->timestamps();

            $table->foreign('state_id')
            ->references('id')
            ->on('states')
            ->onDelete('cascade');
        });

        $local_govts = ["shomolu", "ikere", "yaba", "ado", "ijebu", "lekki", "efon", "ife", "ijesha", "delta"];
        foreach($local_govts as $locals){
            $state = State::inRandomOrder()->first();
            Lga::create([
                "state_id" => $state->id,
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
        Schema::dropIfExists('lgas');
    }
}
