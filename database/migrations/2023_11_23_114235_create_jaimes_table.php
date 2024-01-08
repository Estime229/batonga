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
        Schema::create('jaimes', function (Blueprint $table) {
            $table->id();
          
            $table->foreignId("user_id")->references('id')->on('users');
            $table->foreignId("publication_id")->references('id')->on('publications');
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
        Schema::table('jaimes', function(Blueprint $table){
            $table->dropForeign(["user_id", "publication_id"]);
        });
        Schema::dropIfExists('jaimes');
    }
};