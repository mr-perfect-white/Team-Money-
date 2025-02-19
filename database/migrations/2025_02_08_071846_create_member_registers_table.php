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
        Schema::create('member_registers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone',199)->unique();
            $table->string('email',199)->uniqe();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('permanent_addr');
            $table->string('temporary_addr');
            $table->string('document_one');
            $table->string('status');
           // $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_registers');
    }
};
