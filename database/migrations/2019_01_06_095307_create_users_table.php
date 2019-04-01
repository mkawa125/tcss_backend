<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Emadadly\LaravelUuid\Uuids;
use Faker\Provider\Uuid;


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
            $table->uuid('id')->unique();
            $table->primary('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('firstName');
            $table->string('middleName');
            $table->string('surname');
            $table->string('role');
            $table->string('phoneNumber')->nullable();
            $table->boolean('is_changed')->default(0);

            $table->string('password');
            $table->rememberToken();
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
