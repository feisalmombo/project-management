<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestItemBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_item_budgets', function (Blueprint $table) {
            $table->increments('id');
            // Allocated Team
            $table->string('allocated_team_leader');
            $table->string('allocated_field_technician');
            $table->string('allocated_duration');
            $table->string('allocated_number_of_sites');
            // Allowance Allocation
            $table->string('allowance_team_leader');
            $table->string('allowance_field_technician');
            $table->string('allowance_duration');
            $table->string('allowance_number_of_sites');
            // Transport
            $table->string('transport_team');
            $table->string('transport_number_of_sites');
            $table->string('transport_duration');
            $table->string('transport_fuels_cost_day');
            $table->string('transport_lts');
            $table->string('transport_price_per_litre');
            $table->integer('requestmanager_id')->unsigned();
            $table->timestamps();

            $table->foreign('requestmanager_id')->references('id')->on('request_managers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_item_budgets');
    }
}
