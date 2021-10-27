<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug',255)->nullable()->unique();
            $table->integer('order')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('status')->nullable()->default(true);
            $table->timestamps();
        });
        DB::table('pages')->insert([
            ['name' => 'Giới thiệu', 'slug' => 'gioi-thieu', 'order' => 1],
            ['name' => 'Liên hệ', 'slug' => 'lien-he', 'order' => 2]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
