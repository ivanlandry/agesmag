<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ville_id')->index();
            $table->unsignedBigInteger('categorie_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('title');
            $table->text('description');
            $table->integer('prix');
            $table->string('img_1');
            $table->string('img_2');
            $table->string('img_3');
            $table->integer('etat')->default(0);
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
        Schema::dropIfExists('posts');
    }
}
