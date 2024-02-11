<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Natjecanje;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zadatak', function (Blueprint $table) {
            $table->id();
            $table->string('naslov');
            $table->string('opis');
            $table->string('kategorija');
            $table->string('tezina');
            $table->integer('bodovi');
            $table->string('zastavica');
            $table->foreignIdFor(Natjecanje::class)->constrained('natjecanje');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zadatak');
    }
};
