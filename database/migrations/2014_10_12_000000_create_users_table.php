<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('user_type', ['user', 'admin'])->default('user');
            $table->string('name');
            $table->string('avatar')->default('/default/avatar.png');
            $table->string('banner')->default('/default/banner.jpg');

            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('about')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');


            $table->string('web_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('x_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('whatsapp_link')->nullable();
            $table->string('instagram_link')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
