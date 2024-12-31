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
        Schema::create('art_codes', function (Blueprint $table) {
            $table->id();
            $table->string('site_code');
            $table->string('site_name');
            $table->string('art_code')->unique(); // Art Code unik
            $table->string('rsp');
            $table->integer('q_sell_suggest');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('art_codes');
    }
};
