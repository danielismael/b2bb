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
        Schema::create('dealer', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('name', 150);
            $table->char('allow_quotation', '1')->default('N');
            $table->char('allow_partner', '1')->default('N');
            $table->char('sisrev_llc_code', '12')->unique();
            $table->char('sisrev_br_code', '12')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dealer');
    }
};
