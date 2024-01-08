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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->string('contenucomments');
   
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
        Schema::table('commentaires', function(Blueprint $table){
            $table->dropForeign(["user_id", "publication_id"]);
        });
        Schema::dropIfExists('commentaires');
    }
};
