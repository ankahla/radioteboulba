<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToArticlesTable extends Migration
{
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_1684507')->references('id')->on('article_categories');
            $table->unsignedInteger('author_id')->nullable();
            $table->foreign('author_id', 'author_fk_1684511')->references('id')->on('users');
        });
    }
}
