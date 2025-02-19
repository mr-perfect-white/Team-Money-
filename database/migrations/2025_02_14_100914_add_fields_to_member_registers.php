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
    Schema::table('member_registers', function (Blueprint $table) {
        if (!Schema::hasColumn('member_registers', 'uuid')) {
            $table->string('uuid', 225)->unique();
        }
        
        if (!Schema::hasColumn('member_registers', 'password')) {
            $table->string('password', 225);
        }
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_registers', function (Blueprint $table) {
            //
        });
    }
};
