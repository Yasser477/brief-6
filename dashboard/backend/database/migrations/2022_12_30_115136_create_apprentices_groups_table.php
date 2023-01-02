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
        Schema::create('apprentices_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apprentice_id');
            $table->unsignedBigInteger('group_id')->nullable();
            $table->foreign('apprentice_id')->references('id')->on('apprentices')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('set null');
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
        Schema::dropIfExists('apprentices_groups');
    }
};
