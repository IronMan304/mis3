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
        Schema::table('tools', function (Blueprint $table) {
              // Drop the existing foreign key constraint
              $table->dropForeign(['status_id']);

              // Add a new foreign key constraint
              $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tools', function (Blueprint $table) {
               // Drop the new foreign key constraint
               $table->dropForeign(['status_id']);

               // Add the old foreign key constraint
               $table->foreign('status_id')->references('id')->on('types');
        });
    }
};
