<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('user__m_b_s', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('surname');
        $table->text('bio')->nullable();
        $table->string('email')->unique();
        $table->string('phone')->nullable();
        $table->string('profile_picture')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user__m_b_s');
    }
};
