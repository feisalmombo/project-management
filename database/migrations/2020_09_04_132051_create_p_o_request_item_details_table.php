<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePORequestItemDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_o_request_item_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('po_name');
            $table->string('po_value');
            $table->string('client');
            $table->integer('requestmarket_id')->unsigned();
            $table->timestamps();

            $table->foreign('requestmarket_id')->references('id')->on('p_o_request_markets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_o_request_item_details');
    }
}
