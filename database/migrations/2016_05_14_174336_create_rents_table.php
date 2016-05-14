<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('qty');
			$table->double('total_due');
			$table->string('status');
			$table->integer('RentBy');
			$table->string('description');
			$table->double('unit_price');
			$table->integer('total_quantity');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rents');
	}

}
