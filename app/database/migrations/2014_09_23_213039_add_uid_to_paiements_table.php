<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddUidToPaiementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('paiements', function(Blueprint $table)
		{
			$table->string('uid', 50)->after('client_id');
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
			$table->dropColumn('uid');
		});
	}

}
