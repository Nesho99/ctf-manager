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
        Schema::create('rjesenje', function (Blueprint $table) {
            $table->foreignIdFor(Zadatak::class)->constrained('zadatak');
            $table->foreignIdFor(User::class)->constrained('users');
            $table->primary(['zadatak_id', 'user_id']);

        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rjesenje');
    }
};
