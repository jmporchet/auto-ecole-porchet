<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adresses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('client_id');
			$table->string('rue');
			$table->integer('npa');
			$table->string('ville');
			$table->timestamps();
            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adresses');
	}

}
