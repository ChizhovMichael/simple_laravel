<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnToBlackListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('black_lists', function (Blueprint $table) {
            //
            $table->renameColumn('compnay', 'company');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('black_lists', function (Blueprint $table) {
            //
            $table->renameColumn('company', 'compnay');
        });
    }
}
