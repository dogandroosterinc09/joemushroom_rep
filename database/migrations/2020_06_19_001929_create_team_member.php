<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamMember extends Migration
{
    /**
     * Run the migrations...
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_member', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('memFname');
            $table->string('memLname');
            $table->string('memPosition');
            $table->text('memBio');
            $table->string('memFile');
            $table->string('memPic');
            $table->string('created_by');
            $table->string('deleted')->default(0);
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
        Schema::dropIfExists('team_member');
    }
}
