<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number');
            $table->string('name');
            $table->foreignId('level_id')->on('levels')->nullable()->index();
            $table->string('id_card_number')->nullable();
            $table->string('telephone')->nullable();
            $table->boolean('is_active')->default(1);
            $table->enum('gender',['female','male'])->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_query_student')->default(0);
            $table->boolean('is_query_teacher')->default(0);
            $table->boolean('is_query_manager')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
