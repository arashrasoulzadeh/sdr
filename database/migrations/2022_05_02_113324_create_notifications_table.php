<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::statement('CREATE TABLE notifications ( id MEDIUMINT NOT NULL AUTO_INCREMENT, type tinyint, name varchar(255), message  varchar(255), destination varchar(255), success bool, created_at datetime DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (id) )  ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('drop table notifications ');
    }
};
