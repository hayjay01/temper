<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRetentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_retentions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('onboarding_percentage');
            $table->integer('count_applications');
            $table->integer('count_accepted_applications');
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
        Schema::dropIfExists('user_retentions');
    }
}
