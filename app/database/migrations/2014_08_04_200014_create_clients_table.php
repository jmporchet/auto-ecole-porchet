<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('prenom');
			$table->string('nom');
			$table->string('telephone');
			$table->string('profession');
			$table->date('date_naissance');
			$table->string('email');
            $table->enum('type_examen', ['examen', 'test']);
			$table->string('notes');
			$table->string('trouve_comment');
            $table->enum('regard', [1,2,3,4,5]);
            $table->enum('volant', [1,2,3,4,5]);
            $table->enum('accelerateur', [1,2,3,4,5]);
            $table->enum('frein', [1,2,3,4,5]);
            $table->enum('boite', [1,2,3,4,5]);
            $table->enum('embrayage', [1,2,3,4,5]);
            $table->enum('rti', [1,2,3,4,5]);
            $table->enum('priorites', [1,2,3,4,5]);
            $table->enum('approche', [1,2,3,4,5]);
            $table->enum('decision', [1,2,3,4,5]);
            $table->enum('autoroute', [1,2,3,4,5]);
            $table->enum('manoeuvres', [1,2,3,4,5]);
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
		Schema::drop('clients');
	}

}
