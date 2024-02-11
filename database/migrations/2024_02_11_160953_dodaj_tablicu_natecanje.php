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
        Schema::create('natjecanje', function (Blueprint $table) {
            $table->id();
            $table->string('naslov')->unique();
            $table->string('opis');
            $table->dateTime('pocetak');
            $table->dateTime('kraj');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('natjecanje', function (Blueprint $table) {
            Schema::dropIfExists('natjecanje');
        });
    }
};
