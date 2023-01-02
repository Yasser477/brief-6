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
        Schema::create('apprentice_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apprentice_id');
            $table->unsignedBigInteger('task_id');
            $table->foreign('apprentice_id')->references('id')->on('apprentices')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('task')->onDelete('cascade');
            $table->char('state')->nullable();
            $table->dateTime('startDate');
            $table->dateTime('endDate');
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
        Schema::dropIfExists('apprentice_tasks');
    }
};
