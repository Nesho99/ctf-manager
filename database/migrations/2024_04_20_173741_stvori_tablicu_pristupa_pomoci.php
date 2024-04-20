<?php

use App\Models\Natjecanje;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\User;



return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pristup_pomoci', function (Blueprint $table) {
         
            $table->foreignIdFor(User::class)->constrained("users");
            $table->foreignIdFor(Natjecanje::class)->constrained("natjecanje");
            $table->timestamp('vrijeme_pristupio')->useCurrent();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("pristup_pomoci");
    }
};
