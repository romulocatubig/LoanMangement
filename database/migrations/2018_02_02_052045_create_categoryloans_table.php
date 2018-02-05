<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryloansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoryloans', function (Blueprint $table) {
           $table->increments('id');
           $table->string('loantype');
           $table->integer('interest');
           $table->decimal('minimum_loan', 10,2);
           $table->decimal('maximum_loan', 10,2);
           $table->string('status');
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
        Schema::dropIfExists('categoryloans');
    }
}
