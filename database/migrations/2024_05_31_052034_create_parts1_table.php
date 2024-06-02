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
        Schema::create('parts1', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tool_id')->nullable();
            $table->foreign('tool_id')->references('id')->on('tools');

            $table->unsignedBigInteger('part_type_id')->nullable();
            $table->foreign('part_type_id')->references('id')->on('part_types');

            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');

            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('statuses');

            $table->string('property_number')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parts1');
    }
};
