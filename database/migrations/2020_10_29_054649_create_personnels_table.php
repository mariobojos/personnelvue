<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('lastname')->default('');
            $table->string('firstname')->default('');
            $table->string('midname')->default('');
            $table->date('dob');
            $table->date('date_hired')->nullable();
            $table->enum('gender', ['MALE', 'FEMALE', 'OTHER']);
            $table->enum('emp_status', ['PROBY', 'REG']);
            $table->enum('civil_status', ['SINGLE', 'MARRIED', 'SEPARATED', 'DIVORCED', 'WIDOW/ER']);
            $table->enum('department', ['IT', 'MARKETING', 'HR', 'SERVICES']);
            $table->string('address1');
            $table->string('address2')->nullable()->default('');
            $table->string('email');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('personnels');
    }
}
