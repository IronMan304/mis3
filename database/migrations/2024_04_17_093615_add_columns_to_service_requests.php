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
        Schema::table('service_requests', function (Blueprint $table) {

            $table->dateTime('dt_requested')->nullable();
            $table->dateTime('dt_approved')->nullable();
            $table->dateTime('dt_started')->nullable();
            $table->dateTime('dt_returned')->nullable();

            $table->dateTime('dt_rejected')->nullable();
            $table->dateTime('dt_cancelled')->nullable();


            $table->unsignedBigInteger('dt_requested_user_id')->nullable();
            $table->foreign('dt_requested_user_id')->references('id')->on('users');
            $table->unsignedBigInteger('dt_approved_user_id')->nullable();
            $table->foreign('dt_approved_user_id')->references('id')->on('users');
            $table->unsignedBigInteger('dt_started_user_id')->nullable();
            $table->foreign('dt_started_user_id')->references('id')->on('users');
            $table->unsignedBigInteger('dt_returned_user_id')->nullable();
            $table->foreign('dt_returned_user_id')->references('id')->on('users');

            $table->unsignedBigInteger('dt_rejected_user_id')->nullable();
            $table->foreign('dt_rejected_user_id')->references('id')->on('users');
            $table->unsignedBigInteger('dt_cancelled_user_id')->nullable();
            $table->foreign('dt_cancelled_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_requests', function (Blueprint $table) {
            $table->dropColumn('dt_requested');
            $table->dropColumn('dt_approved');
            $table->dropColumn('dt_started');
            $table->dropColumn('dt_returned');

            $table->dropColumn('dt_rejected');
            $table->dropColumn('dt_cancelled');


            $table->dropColumn('dt_requested_user_id');
            $table->dropColumn('dt_approved_user_id');
            $table->dropColumn('dt_started_user_id');
            $table->dropColumn('dt_returned_user_id');

            $table->dropColumn('dt_rejected_user_id');
            $table->dropColumn('dt_cancelled_user_id');
        });
    }
};
