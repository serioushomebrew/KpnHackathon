<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFloorsTable extends Migration {

	public function up()
	{
		Schema::create('floors', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('level');
			$table->string('title', 255);
			$table->text('description');
			$table->integer('building_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('floors');
	}
}