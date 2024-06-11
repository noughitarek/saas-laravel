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
        Schema::create('investors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role')->nullable();
            
            $table->string('phone')->nullable();
            $table->string('picture')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();

            $table->boolean('dark')->default(1);
            $table->string('primary_color')->default('22 78 99');
            $table->string('secondary_color')->default('226 232 240');
            $table->string('warning_color')->default('245 158 11');
            $table->string('danger_color')->default('185 28 28');
            $table->string('success_color')->default('13 148 136');
            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('investors_sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('investor_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investors');
        Schema::dropIfExists('investors_sessions');
    }
};
