<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id()->primary();
            $table->uuid('uuid')->unique();

            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            $table->text('encrypted_master_key');
            $table->text('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->string('token')->nullable();

            $table->string('phone_number')->nullable();
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->enum('status', ['active', 'banned', 'inactive'])->default('active');

            $table->unsignedTinyInteger('failed_attempts')->default(0);
            $table->string('last_login_ip')->nullable();
            $table->boolean('is_verified')->default(false);

            $table->rememberToken();

            $table->timestamp('last_login_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
    }
};
