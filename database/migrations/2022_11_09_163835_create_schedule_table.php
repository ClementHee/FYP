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
        Schema::create('schedules', function (Blueprint $table) {
            $table->foreignUuid('eventId')->references('eventId')->on('events')->onDelete('cascade')->onUpdate('cascade')->primary();
            $table->date('eventdate');
            $table->foreignId('roles')->references('roleId')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('profileId')->references('profileId')->on('member_profiles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
