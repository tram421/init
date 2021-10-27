<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_contents', function (Blueprint $table) {
            $table->id();
            $table->string('image', 255);
            $table->string('main_content', 1024)->nullable();
            $table->string('mini_content', 1024)->nullable();
            $table->string('content_button', 255);
            $table->string('url_button', 255)->nullable();
            $table->timestamps();
        });
        DB::table('top_contents')->insert([
           'image' => 'no-image',
           'main_content' => 'Xưởng cơ khí Hoàng Minh',
            'mini_content' => 'Cơ khí chế tạo xưởng cơ khí Hoàng Minh, chuyên sản xuất, gia công, dịch vụ cơ khí tại phường 8, thành phố Vĩnh Long, tỉnh Vĩnh Long',
            'content_button' => 'Giới thiệu',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('top_contents');
    }
}
