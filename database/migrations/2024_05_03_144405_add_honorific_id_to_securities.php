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
        Schema::table('securities', function (Blueprint $table) {
            $table->unsignedBigInteger('honorific_id')->nullable()->after('id');
            $table->foreign('honorific_id')->references('id')->on('honorifics');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('securities', function (Blueprint $table) {
            $table->dropColumn('honorific_id');
        });
    }
};
