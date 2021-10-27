<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->integer('price')->nullable()->default(0);
            $table->integer('price_sale')->nullable()->default(0);
            $table->text('short_content')->nullable();
            $table->longText('description')->nullable();
            $table->string('image',255)->nullable()->default("no-image");
            $table->boolean('feature')->nullable()->default(false);
            $table->longText('specification')->nullable();
            $table->boolean('active')->nullable()->default(false);
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
        Schema::dropIfExists('products');
    }
}
