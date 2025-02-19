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
            // $table->string('pan_num',199)->unique();
            // $table->string('pan_doc',199);
            // $table->integer('adhr_num')->unique();
            // $table->string('adhr_doc',199);
            // $table->integer('accnt_num')->unique();
            // $table->string('accnt_ifsc_num',199);
            // $table->string('accnt_brnch_dtl',199);
            // $table->string('monthly_inc',199);
            // $table->integer('sadh_mem');
            // $table->string('sadh_mem_id',199);
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
