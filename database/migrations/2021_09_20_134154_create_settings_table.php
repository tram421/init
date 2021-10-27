<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->default('Hoàng Minh')->nullable();
            $table->string('hotline',255)->nullable();
            $table->string('address',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('zalo',255)->nullable();
            $table->string('short_description',1024)->nullable();
            $table->string('ship_info',1024)->nullable();
            $table->string('open_at',255)->nullable();
            $table->boolean('show_price')->default(1)->nullable();
            $table->integer('sale_all_percent')->nullable();
            $table->string('category_sale',255)->nullable();
            $table->integer('category_sale_percent')->nullable();
            $table->integer('image_product_number')->nullable();
            $table->boolean('delete_image')->default(1)->nullable();
            $table->boolean('maintenance')->default(0)->nullable();
            $table->string('email',255)->nullable();
            $table->string('password_app',255)->nullable();
            $table->timestamps();
        });

        DB::table('settings')->insert([
           'name' => 'Hoàng Minh',
           'open_at' => '7h-17h',
           'phone' => '02703827439',
           'zalo' => '0896650454',
           'address' => '5A, đường Phó Cơ Điều, phường 8, Tp Vĩnh Long, tỉnh Vĩnh Long',
            'hotline' => '0907641676'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
