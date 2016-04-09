<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomsTable extends Migration {

	public function up()
	{
		Schema::create('rooms', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('order');
			$table->string('category', 100)->default('"no category assigned"');
			$table->string('title', 100)->default('"no title assigned"');
			$table->text('description')->nullable();
			$table->integer('max_users')->default('3');
			$table->integer('is_specialroom')->unsigned()->nullable()->default(null);
			$table->integer('floor_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('rooms');
	}
}