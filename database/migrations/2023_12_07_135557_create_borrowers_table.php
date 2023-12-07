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
        Schema::create('borrowers', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('id_number')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('contact_number');

            $table->unsignedBigInteger('sex_id')->nullable();
            $table->foreign('sex_id')->references('id')->on('sexes');

            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses');

            $table->unsignedBigInteger('college_id')->nullable();
            $table->foreign('college_id')->references('id')->on('colleges');

            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowers');
    }
};
