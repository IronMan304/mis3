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
        Schema::table('request_tools_tool_securities_key', function (Blueprint $table) {
            $table->unsignedBigInteger('request_id')->nullable()->after('status_id');
            $table->foreign('request_id')->references('id')->on('requests');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('request_tools_tool_securities_key', function (Blueprint $table) {
            $table->dropColumn('request_id');
        });
    }
};
