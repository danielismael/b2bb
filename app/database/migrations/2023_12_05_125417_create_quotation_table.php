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
        Schema::create('quotation', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('client_name');
            $table->string('client_order');
            $table->string('requested_by');
            $table->boolean('urgent')->default(false);
            $table->dateTime('deadline');
            $table->char('type', '1')->comment('0 = RFQ, 1 = RFI, 2 = RFC');
            $table->char('status', '1')->comment('0 = Processing, 1 = Completed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotation');
    }
};
