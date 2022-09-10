<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up():void
    {
        Schema::create('user_logins', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user")->unsigned();
            $table->timestamps();

            $table->foreign("user")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down():void
    {
        Schema::dropIfExists('user_logins');
    }
};
