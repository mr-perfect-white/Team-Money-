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
        Schema::create('team_meetings', function (Blueprint $table) {
            $table->id();
            $table->string('tm_mtng_nm',199);
            $table->string('tm_mtng_purpose',199);
            $table->string('tm_mtng_details',199);
            $table->string('tm_mtng_date',199);
            $table->string('tm_mtng_time',199);
            $table->string('tm_mtng_mode',199);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_meetings');
    }
};
