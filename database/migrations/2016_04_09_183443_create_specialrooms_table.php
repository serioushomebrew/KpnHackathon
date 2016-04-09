<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpecialroomsTable extends Migration {

	public function up()
	{
		Schema::create('specialrooms', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('action', 255);
		});
	}

	public function down()
	{
		Schema::drop('specialrooms');
	}
}