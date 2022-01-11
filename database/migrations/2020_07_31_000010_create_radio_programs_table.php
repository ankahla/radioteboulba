<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadioProgramsTable extends Migration
{
    public function up()
    {
        Schema::create('radio_programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('time');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
