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
        Schema::table('requests', function (Blueprint $table) {
            $table->unsignedBigInteger('option_id')->nullable()->after('status_id');
            $table->foreign('option_id')->references('id')->on('options');
            $table->date('estimated_return_date')->nullable()->after('option_id');
            $table->string('purpose')->nullable()->after('estimated_return_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropColumn('option_id');
            $table->dropColumn('estimated_return_date');
            $table->dropColumn('purpose');
        });
    }
};
