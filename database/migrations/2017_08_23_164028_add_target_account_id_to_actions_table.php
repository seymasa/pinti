<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTargetAccountIdToActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actions', function (Blueprint $table) {
            $table->integer('target_account_id')->unsigned()->nullable();

            $table->foreign('target_account_id')
                  ->references('id')->on('accounts')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actions', function (Blueprint $table) {
            $table->dropForeign('actions_target_account_id_foreign');

            $table->dropColumn('target_account_id');
        });
    }
}
