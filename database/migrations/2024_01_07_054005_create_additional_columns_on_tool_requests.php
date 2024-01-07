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
        Schema::table('tool_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('status_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('returner_id')->nullable()->after('user_id');
            $table->foreign('returner_id')->references('id')->on('borrowers');

            $table->unsignedBigInteger('tool_status_id')->nullable()->after('returner_id');
            $table->foreign('tool_status_id')->references('id')->on('statuses');

            $table->string('description')->nullable()->after('tool_status_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tool_requests', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('returner_id');
            $table->dropColumn('tool_status_id');
            $table->dropColumn('description');
        });
    }
};
