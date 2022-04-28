<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('postnom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('sexe')->nullable();
            $table->string('numcarteidentite')->nullable();
            $table->string('idagent')->unique();
            $table->foreignId('user_id') 
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignkeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("users", function (Blueprint $table) {
            $table->dropForeign("user_id");
        });
        Schema::dropIfExists('agents');
    }
}
