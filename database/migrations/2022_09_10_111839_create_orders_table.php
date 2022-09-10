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
        if (!Schema::hasTable("orders")) {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->bigInteger("customer_id")->unsigned();

                $table->double("quantity");
                $table->double("price");

                $table->date("date");

                $table->enum("status", ["pending", "pending payment", "paid"]);

                $table->timestamps();

                $table->foreign("customer_id")->references("id")->on("users");

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
