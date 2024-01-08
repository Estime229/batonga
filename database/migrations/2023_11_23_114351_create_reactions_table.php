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
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->enum('typereact', ['like', 'coeur', 'mdr'])->default('like');
          
            $table->foreignId("user_id")->references('id')->on('users');
            $table->foreignId("commentaire_id")->references('id')->on('commentaires');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {  Schema::table('reactions', function(Blueprint $table){
            $table->dropForeign(["user_id", "commentaire_id"]);
        });
        Schema::dropIfExists('reactions');
    }
};
