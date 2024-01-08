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
        Schema::create('amis', function (Blueprint $table) {
            $table->id();
            $table->enum('statutdemande', ['en_attente', 'accepte', 'refuse'])->default('en_attente');
            $table->unsignedBigInteger('user_id1');
            $table->unsignedBigInteger('user_id2');
            $table->foreign('user_id1')->references('id')->on('users');
            $table->foreign('user_id2')->references('id')->on('users');

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
        Schema::table('amis', function(Blueprint $table){
            $table->dropForeign(["user_id1", "user_id2"]);
        });
        Schema::dropIfExists('amis');
    }
};
