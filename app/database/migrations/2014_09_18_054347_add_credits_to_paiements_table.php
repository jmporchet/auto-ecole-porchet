<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddCreditsToPaiementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('paiements', function(Blueprint $table)
		{
			$table->smallInteger('credits')
                ->nullable()
                ->after('montant');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('paiements', function(Blueprint $table)
		{
			$table->dropColumn('credits');
		});
	}

}
