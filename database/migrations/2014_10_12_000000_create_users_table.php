<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('std_first_name');
            $table->string('std_last_name');
            $table->string('std_gender');
            $table->string('std_nic_no')->unique();
            $table->string('std_reg_no')->unique();
            $table->string('password');
            $table->string('std_birthday');
            $table->string('std_address');
            $table->string('email')->unique();
            $table->string('std_mobile_no');
            $table->integer('distance');
            $table->date('std_admission_date');
            $table->date('std_admission_expire_date')->nullable();
            $table->string('std_faculty_id');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
