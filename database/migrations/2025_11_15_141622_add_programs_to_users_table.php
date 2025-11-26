<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('program_category')->nullable()->after('role');
            $table->string('bachelor_program')->nullable()->after('program_category');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['program_category','bachelor_program']);
        });
    }
};
