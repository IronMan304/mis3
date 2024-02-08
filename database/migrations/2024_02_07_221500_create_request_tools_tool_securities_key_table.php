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
        Schema::create('request_tools_tool_securities_key', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_tools_id')->nullable();
            $table->foreign('request_tools_id')->references('id')->on('tool_requests'); // the table should be call request_tools but i messed up
            $table->unsignedBigInteger('security_id')->nullable();
            $table->foreign('security_id')->references('id')->on('positions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_tools_tool_securities_key');
    }
};
