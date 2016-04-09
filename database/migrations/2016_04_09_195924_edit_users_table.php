<?php

use Illuminate\Database\Migrations\Migration;

class EditUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("users", function($table) {
            $table->renameColumn("workspace_id", "room_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("users", function($table) {
            $table->renameColumn("room_id", "workspace_id");
        });
    }
}
