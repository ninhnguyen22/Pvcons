<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactReplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_replays', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('from');
            $table->string('from_name');
            $table->string('bcc')->nullable();
            $table->unsignedBigInteger('contact_id');
            $table->text('content');
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
        Schema::dropIfExists('contact_replays');
    }
}
