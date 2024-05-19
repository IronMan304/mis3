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
            // Change column to text type temporarily allowing nulls to avoid data truncation issues
            $table->text('purpose')->nullable()->change();
        });

        // After changing the column type, update it to not null if needed
        Schema::table('requests', function (Blueprint $table) {
            $table->text('purpose')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requests', function (Blueprint $table) {
            // Change column back to string type, allowing nulls first
            $table->string('purpose', 255)->nullable()->change();
        });

        // After changing the column type, update it to not null
        Schema::table('requests', function (Blueprint $table) {
            $table->string('purpose', 255)->nullable(false)->change();
        });
    }
};
