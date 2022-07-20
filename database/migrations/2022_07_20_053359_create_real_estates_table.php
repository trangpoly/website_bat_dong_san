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
        Schema::create('real_estates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('price',9,3);
            $table->integer('area');
            $table->integer('bed');
            $table->integer('bath');
            $table->string('phone');
            $table->string('address');
            $table->string('email');
            $table->string('short_desc');
            $table->string('desc');
            $table->string('photo_gallery');
            $table->string('image');
            $table->integer('in_stock')->nullable()->default(0);
            $table->integer('status')->nullable()->default(0);
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
        Schema::dropIfExists('real_estates');
    }
};
