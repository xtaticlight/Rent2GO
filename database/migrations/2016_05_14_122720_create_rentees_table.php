<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRenteesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('material_id');
            $table->integer('qty');
            $table->double('total_due');
            $table->string('status');
            $table->integer('RentBy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rentees');
    }

}
