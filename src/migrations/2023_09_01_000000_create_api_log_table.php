<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Sarahman\HttpRequestApiLog\Helper;

class CreateApiLogTable extends Migration
{
    public function up()
    {
        $config = Helper::getConfig();

        Schema::connection($config['database_connection'])->create($config['table_name'], function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client', 50)->index();
            $table->string('method', 6);
            $table->string('endpoint', 2083)->index();
            $table->longText('params');
            $table->char('response_code', 3);
            $table->longText('response');
            $table->timestamps();
            $table->index('created_at');
        });
    }

    public function down()
    {
        $config = Helper::getConfig();

        Schema::connection($config['database_connection'])->dropIfExists($config['table_name']);
    }
}
