<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('short_description')->nullable();
            $table->longText('content')->nullable();
            $table->string('status')->nullable();
            $table->boolean('hot')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
