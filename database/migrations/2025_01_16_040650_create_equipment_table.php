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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->date('purchase_date')->nullable();
            $table->string('purchase_from')->nullable();
            $table->string('invoice_number')->nullable();
            $table->integer('client')->nullable();
            $table->integer('equipment_type')->nullable();
            $table->string('manufacture')->nullable();
            $table->string('equipment_model')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('asset_tag')->nullable();
            $table->string('case_color')->nullable();
            $table->string('operating_system')->nullable();
            $table->tinyInteger('separate_keyboard')->nullable()->default(1);
            $table->string('keyboard_model')->nullable();
            $table->tinyInteger('dongle')->nullable()->default(1);
            $table->string('dongle_asset_tag')->nullable();
            $table->string('power_adapter_asset_tag')->nullable();
            $table->string('computer_name')->nullable();
            $table->integer('shipping_case_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
