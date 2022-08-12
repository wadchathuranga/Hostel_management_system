<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostelRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostel_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('std_uic_no')->unique();
            $table->string('std_nic_no')->unique();
            $table->string('academic_year');
            $table->string('email');
            $table->string('method');
            $table->string('bank_name');
            $table->string('transaction_number');
            $table->string('transaction_amount');
            $table->dateTime('transaction_date');
            $table->string('process')->default(0);
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
        Schema::dropIfExists('hostel_requests');
    }
}
