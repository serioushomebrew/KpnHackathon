<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuildingsTable extends Migration {

	public function up()
	{
		Schema::create('buildings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('address', 255);
			$table->string('place', 255);
			$table->string('region', 255);
		});
	}

	public function down()
	{
		Schema::drop('buildings');
	}
}