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
        Schema::create('volunteer_type', function (Blueprint $table) {
            $table->foreignUuid('profileId')->references('profileId')->on('member_profiles')->onDelete('cascade')->onUpdate('cascade')->primary();
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
        Schema::dropIfExists('volunteer_type');
    }
};
