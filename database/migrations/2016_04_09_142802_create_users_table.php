<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('workspace_id');
			$table->string('name', 255)->default('"no name assigned"');
			$table->string('function', 255)->nullable();
			$table->text('description')->nullable();
			$table->string('image', 255)->default('"insertDummyImageHere.png"');
			$table->string('image_thumb', 100)->nullable()->default('"insertDummyImageThumbHere.png"');
			$table->tinyInteger('active')->default('1');
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}