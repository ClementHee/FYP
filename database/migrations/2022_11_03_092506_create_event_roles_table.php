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
        Schema::create('event_roles', function (Blueprint $table) {
            $table->foreignId('eventtypeId')->references('eventtypeId')->on('event_roles')->onDelete('cascade')->onUpdate('cascade')->primary();
            $table->foreignId('roles')->references('roleId')->on('roles')->onDelete('cascade')->onUpdate('cascade')->primary();
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
        Schema::dropIfExists('event_roles');
    }
};
