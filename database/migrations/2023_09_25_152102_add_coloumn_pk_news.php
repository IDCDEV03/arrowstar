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
        Schema::table('package_news', function (Blueprint $table) {
            $table->string('program_spacial_req')->after('package_name')->nullable();
            $table->text('program_remark')->after('program_spacial_req')->nullable();
            $table->text('program_tips')->after('program_remark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
