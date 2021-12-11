<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('news_category_id');
            $table->boolean('is_show')->default(true);
            $table->smallInteger('priority')->default(1);
            $table->text('preview')->nullable();
            $table->text('description');
            $table->text('image')->nullable();
            $table->unsignedInteger('admin_user_id')->nullable();
            $table->timestamps();

            $table->foreign('news_category_id')
                ->references('id')
                ->on('news_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
