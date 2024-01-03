<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideoPathToVideoViews extends Migration
{
    public function up()
    {
        Schema::table('video_views', function (Blueprint $table) {
            $table->string('video_path')->nullable();
        });
    }

    public function down()
    {
        Schema::table('video_views', function (Blueprint $table) {
            $table->dropColumn('video_path');
        });
    }
}


