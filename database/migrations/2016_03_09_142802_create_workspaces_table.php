<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkspacesTable extends Migration {

	public function up()
	{
		Schema::create('workspaces', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('order');
			$table->string('category', 100)->default('"no category assigned"');
			$table->string('title', 100)->default('"no title assigned"');
			$table->text('description')->nullable();
			$table->integer('max_users')->default('3');
			$table->integer('has_specialworkspace')->unsigned()->nullable()->default(null);
		});
	}

	public function down()
	{
		Schema::drop('workspaces');
	}
}