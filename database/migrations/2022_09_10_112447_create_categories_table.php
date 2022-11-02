<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("category_name");
            $table->text("description");
            $table->text("image");
            $table->timestamps();
        });

//          do not delete this
//        DB::update("UPDATE `categories` SET
//                        `category_name`='Breakfast',
//                        `description`='Meals to start your day',
//                        `image`='public/images/categories/9RQ9tXuVVfzzv4ucmYpFTxyUUlSjStTAHYe3hkkN.jpg' WHERE 1");
//
//        DB::update("UPDATE `categories` SET
//                        `category_name`='Lunch',
//                        `description`='Middle of the day? Have a meal with us then',
//                        `image`='public/images/categories/1FYVQCNLnCX8FxHNJZRfJcFJEmzqLQODGrJyWnUw.jpg' WHERE 1");
//
//        DB::update("UPDATE `categories` SET
//                        `category_name`='Dinner',
//                        `description`='Nighttime already; Have something to eat before you sleep',
//                        `image`='public/images/categories/8UAiY5l0lTNsxr7HjlAFFX7I34CPdjLCi2NrUekR.jpg' WHERE 1");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
