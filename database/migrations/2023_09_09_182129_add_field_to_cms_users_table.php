<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToCmsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_users', function (Blueprint $table) {
            $table->string('type')->nullable()->comment("User/User company/User student => null, company, student");
            $table->foreignId('company_id')->nullable();
            $table->foreignId('student_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_users', function (Blueprint $table) {
            //
        });
    }
}
