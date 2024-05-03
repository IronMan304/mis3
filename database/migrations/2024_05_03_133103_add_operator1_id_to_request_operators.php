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
        Schema::table('request_operators', function (Blueprint $table) {
            $table->unsignedBigInteger('operator1_id')->nullable()->after('id');
            $table->foreign('operator1_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('request_operators', function (Blueprint $table) {
            $table->dropColumn('operator1_id');
        });
    }
};
