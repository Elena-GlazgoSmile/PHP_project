<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendsTable extends Migration
{
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('friend_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user__m_b_s')->onDelete('cascade');
            $table->foreign('friend_id')->references('id')->on('user__m_b_s')->onDelete('cascade');

            $table->unique(['user_id', 'friend_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('friends');
    }
}
