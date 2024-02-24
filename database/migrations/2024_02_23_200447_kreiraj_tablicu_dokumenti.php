<?php

use App\Models\Zadatak;
use App\Models\User;
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
        Schema::create('dokument', function (Blueprint $table) {
            $table->string("ime");
            $table->string("putanja");
            $table->foreignIdFor(User::class)->constrained("users");
            $table->foreignIdFor(Zadatak::class)->constrained("zadatak");
            $table->primary(['user_id','zadatak_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokument');
    }
};
