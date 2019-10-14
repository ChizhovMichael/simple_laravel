<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToBlackListsTable extends Migration
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
            $table->string('applicant')->nullable();
            $table->string('applicant_email')->nullable();
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
            $table->dropColumn('applicant');
            $table->dropColumn('applicant_email');
        });
    }
}
