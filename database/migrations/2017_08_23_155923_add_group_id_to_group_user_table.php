<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupIdToGroupUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_user', function (Blueprint $table) {
            $table->integer('group_id')->unsigned();

            $table->foreign('group_id')
                  ->references('id')->on('groups')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('group_user', function (Blueprint $table) {
            $table->dropForeign('group_user_group_id_foreign');

            $table->dropColumn('group_id');
        });
    }
}
