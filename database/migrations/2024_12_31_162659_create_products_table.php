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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('art_code')->nullable()->after('id');
            $table->date('date');
            $table->string('product');
            $table->string('category');
            $table->integer('qty_in')->default(0);
            $table->integer('qty_out')->default(0);
            $table->integer('sisa')->default(0);
            $table->string('exp_batch')->nullable();
            $table->string('pbf')->nullable();
            $table->timestamps();

            $table->foreign('art_code')->references('art_code')->on('art_codes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('art_code'); // menghapus kolom art_code saat migrasi mundur
        });
    }
};
