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
        Schema::create('member_profiles', function (Blueprint $table) {
            $table->uuid('userId')->unique();
            $table->string('name');
            $table->string('phone');
            $table->string('handphoneNo');
            $table->string('email');
            $table->text('address');
            $table->string('congregation');
            $table->boolean('isVolunteer');
            $table->boolean('isStaff')->default("0");
            $table->string('gender');
            $table->string('designation');
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
        Schema::dropIfExists('member_profiles');
    }
};
