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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->string('nome');
            $table->string('login');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('foto_perfil')->nullable();
            
            $table->boolean('admin')->default(false);
            $table->boolean('email_verificado')->default(false);

            $table->rememberToken();

            $table->timestamp('data_criacao')->useCurrent();
            $table->timestamp('data_edicao')->useCurrentOnUpdate()->nullable()->default('00-00-00 00:00:00');
            $table->timestamp('data_verificacao')->nullable()->default('00-00-00 00:00:00');

            $timestamps = false;
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
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
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('sessions');
    }
};
