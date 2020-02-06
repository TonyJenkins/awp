<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUserNameFromComments extends Migration {

    public function up () {

        Schema::table('comments', function (Blueprint $table) {

            $table -> dropColumn ('name');
        });
    }

    public function down () {

        Schema::table('comments', function (Blueprint $table) {

            $table -> string ('name', 64) -> nullable (false);

        });
    }
}
