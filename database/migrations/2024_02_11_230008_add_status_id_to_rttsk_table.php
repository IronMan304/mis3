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
            $table->unsignedBigInteger('status_id')->nullable()->after('security_id');
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('request_tools_tool_securities_key', function (Blueprint $table) {
            $table->dropColumn('status_id');
        });
    }
};
