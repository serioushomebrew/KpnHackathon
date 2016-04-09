<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpecialworkspacesTable extends Migration {

	public function up()
	{
		Schema::create('specialworkspaces', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('action', 255);
		});
	}

	public function down()
	{
		Schema::drop('specialworkspaces');
	}
}