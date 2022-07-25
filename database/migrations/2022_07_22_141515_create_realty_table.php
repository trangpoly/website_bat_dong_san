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
        Schema::create('realty', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('price',12,3);
            $table->integer('bed');
            $table->integer('bath');
            $table->float('area');
            $table->string('phone');
            $table->string('address');
            $table->string('email');
            $table->string('short_desc');
            $table->text('desc');
            $table->text('photo_gallery');
            $table->string('image');
            $table->integer('in_stock')->nullable()->default(0);
            $table->integer('status')->nullable()->default(0);
            $table->integer('category_realty_id');
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
        Schema::dropIfExists('realty');
    }
};
