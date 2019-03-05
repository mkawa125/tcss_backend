<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Messages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('messages', function (Blueprint $blueprint){
            $blueprint->uuid('id');
            $blueprint->text('message_body')->nullable();
            $blueprint->string('email_address')->nullable();
            $blueprint->timestamps();
            $blueprint->string('subject')->nullable();
            $blueprint->string('fullNames');
            $blueprint->string('status')->default(0);
            $blueprint->dateTime('deleted_at')->nullable();
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
}
