<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovedByHODsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approved_by_h_o_ds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projectmanager_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('approve_description')->nullable();
            $table->text('approve_status')->nullable(); // for Approve or Reject Status
            $table->timestamps();

            $table->foreign('projectmanager_id')->references('id')->on('request_managers')->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approved_by_h_o_ds');
    }
}
