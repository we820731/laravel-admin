<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_cart', function (Blueprint $table) {

            $table->increments('sid')->comment('購物車id');
            $table->integer('uid')->unsigned()->comment('會員id');
            $table->integer('pdid')->unsigned()->comment('商品副檔id');
            $table->string('s_name',100)->comment('商品名稱');
            $table->string('s_pic',100)->comment('商品主圖');
            $table->string('s_type',100)->comment('款式');
            $table->integer('s_quantity')->default(0)->comment('數量');
            $table->integer('s_unitprice')->default(0)->comment('單價');
            $table->integer('s_amount')->default(0)->comment('總價');
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
        Schema::dropIfExists('shop_cart');
    }
}
