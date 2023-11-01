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
        Schema::create('rental_car', function (Blueprint $table) {
            $table->id();
            $table->string('car_type');
            $table->string('start_province');
            $table->string('start_amphur');
            $table->string('place_start');
            $table->string('end_province');
            $table->string('end_amphur');
            $table->string('place_end');
            $table->date('go_date');
            $table->date('back_date');
            $table->string('category_car');
            $table->tinyText('roadmap')->nullable();
            $table->string('number_people')->nullable();
            $table->string('number_car')->nullable();
            $table->string('member_name');
            $table->string('member_phone');
            $table->string('member_email');
            $table->string('member_company')->nullable();
            $table->string('req_detail')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('rental_car');
    }
};
