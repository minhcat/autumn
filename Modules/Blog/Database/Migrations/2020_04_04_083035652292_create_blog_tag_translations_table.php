<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTagTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog__tag_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('tag_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['tag_id', 'locale']);
            $table->foreign('tag_id')->references('id')->on('blog__tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog__tag_translations', function (Blueprint $table) {
            $table->dropForeign(['tag_id']);
        });
        Schema::dropIfExists('blog__tag_translations');
    }
}
