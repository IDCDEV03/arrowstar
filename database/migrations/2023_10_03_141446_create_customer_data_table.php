<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_data', function (Blueprint $table) {
            $table->id();
            $table->string('user_fullname');
            $table->string('user_address')->null();
            $table->string('user_province');
            $table->string('user_phone')->null();
            $table->date('user_datetravel')->null();
            $table->string('user_program')->null();
            $table->string('user_amount')->null();
            $table->string('user_remark')->null();
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
        Schema::dropIfExists('customer_data');
    }
};
