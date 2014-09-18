<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddClientUidToCoursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cours', function(Blueprint $table)
		{
            $table->dropForeign('cours_client_id_foreign');
            $table->dropColumn('client_id');
			$table->string('client_uid', 50)->after('id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cours', function(Blueprint $table)
		{
			$table->dropColumn('client_uid');
		});
	}

}
