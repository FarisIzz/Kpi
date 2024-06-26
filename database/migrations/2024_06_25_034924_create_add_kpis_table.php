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
        Schema::create('add_kpis', function (Blueprint $table) {
            $table->id();
            $table->string('teras');
            $table->string('SO');
            $table->string('negeri');
            $table->string('pemilik');
            $table->string('kpi');
            $table->string('pernyataan_kpi');
            $table->string('sasaran');
            $table->string('jenis_sasaran');
            $table->string('pencapaian');
            $table->string('peratus-pencapaian');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('add_kpis', function (Blueprint $table) {
            $table->string('SO')->default('default_value')->change();
        });
        
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_kpis');
    }
};
