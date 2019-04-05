<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('reNumber');
            $table->string('name');
            $table->string('level');
            $table->string('region');
            $table->string('district');
            $table->string('ward');
            $table->string('date_started');
            $table->string('school_type');
            $table->string('ownership');
            $table->string('gender_orientation');
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
        Schema::dropIfExists('schools');
    }
}
