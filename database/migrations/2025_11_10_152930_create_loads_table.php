<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('loads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('room_id')->constrained('rooms');
            $table->string('day');   
            $table->string('time');  
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loads');
    }
};
