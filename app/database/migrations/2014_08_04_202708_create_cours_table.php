<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cours', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('client_id');
			$table->datetime('date');
			$table->text('contenu');
			$table->text('prochaine_fois');
			$table->smallInteger('heures');
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
		Schema::drop('cours');
	}

}
