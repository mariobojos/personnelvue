<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('lastname')->default('');
            $table->string('firstname')->default('');
            $table->string('midname')->default('');
            $table->date('dob');
            $table->date('date_hired');
            $table->boolean('is_available')->default(true);
            $table->enum('emp_status', ['PROBY', 'REG']);
            $table->enum('civil_status', ['SINGLE', 'MARRIED', 'LEGALLY SEPARATED', 'DIVORCED', 'WIDOW/ER']);
            $table->string('address1');
            $table->string('address2');
            $table->string('email');
            $table->string('phone');
            $table->char('sss_num', 15);
            $table->char('tin', 15);
            $table->char('pagibig', 15);
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
        Schema::dropIfExists('employees');
    }
}
