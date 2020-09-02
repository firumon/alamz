<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id(); $migrate = config('alramz.migrate');
            for($i = 1; $i <= $migrate['index']; $i++) $table->string('index' . $i,64)->index()->nullable();
            for($i = 1; $i <= $migrate['date']; $i++) $table->dateTime('date' . $i)->index()->nullable();
            for($i = 1; $i <= $migrate['integer']; $i++) $table->bigInteger('integer' . $i)->default(0);
            for($i = 1; $i <= $migrate['decimal']; $i++) $table->decimal('decimal' . $i,11,3)->default(0);
            for($i = 1; $i <= $migrate['string']; $i++) $table->string('string' . $i,256)->nullable();
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
        Schema::dropIfExists('records');
    }
}
