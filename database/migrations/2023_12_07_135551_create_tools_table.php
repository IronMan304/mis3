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
        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('types');
            $table->unsignedBigInteger('source_id')->nullable();
            $table->foreign('source_id')->references('id')->on('sources');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('types');
            $table->string('brand');
            $table->string('property_number');
            $table->string('barcode')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tools');
    }
};
