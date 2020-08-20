<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->float('h_ct_one', 8, 2);
            $table->float('h_ct_two', 8, 2);
            $table->float('h_ct_three', 8, 2);
            $table->float('half_yearly', 8, 2);
            $table->float('f_ct_one', 8, 2);
            $table->float('f_ct_two', 8, 2);
            $table->float('f_ct_three', 8, 2);
            $table->float('final', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}
