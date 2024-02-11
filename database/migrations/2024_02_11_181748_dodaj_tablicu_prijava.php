<?php

use App\Models\Natjecanje;
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
        Schema::create('prijava', function (Blueprint $table) {
            $table->foreignIdFor(Natjecanje::class)->constrained('natjecanje');
            $table->foreignIdFor(User::class)->constrained('users');
            $table->primary(['natjecanje_id', 'user_id']);
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prijava');
    }
};
