<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment('送信元');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('shop_id')->comment('送信先');
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->string('title');
            $table->text('body');
            $table->dateTime('sent_at');
            $table->boolean('is_read');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });

        Schema::create('shop_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->comment('送信元');
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreignId('user_id')->comment('送信先');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->text('body');
            $table->dateTime('sent_at');
            $table->boolean('is_read');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_messages');
        Schema::dropIfExists('shop_messages');
    }
}
