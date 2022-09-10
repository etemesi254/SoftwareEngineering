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
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->double("unit_price");
            $table->string("description");
            $table->string("image");
            // never go below zero
            $table->integer("available_quantity")->unsigned();
            $table->bigInteger("subcategory_id")->unsigned();

            $table->timestamps();

            $table->foreign("subcategory_id")->references("id")->on("sub_categories");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
