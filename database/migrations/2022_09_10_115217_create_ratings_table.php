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
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();

            $table->bigInteger("user_id")->unsigned();

            $table->string("comment");
            $table->integer("stars");

            $table->bigInteger("menu_item")->unsigned();

            $table->timestamps();

            $table->foreign("menu_item")->references("id")->on("menus");
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
