<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableWpComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wp_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id');
            $table->integer('comment_id');
            $table->string('comment_author');
            $table->text('content');
            $table->integer('rate');
            $table->timestamps();
        });
    }    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wp_comments');
    }
}
