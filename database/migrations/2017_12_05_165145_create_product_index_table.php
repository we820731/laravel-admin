<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductIndexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_index', function (Blueprint $table) {
            $table->increments('pid')->comment('商品主檔id');
            $table->string('p_name',50)->comment('商品名稱');
            $table->string('p_pic',100)->comment('商品主圖');
            $table->text('p_images')->comment('商品副圖(用|分隔)');
            $table->text('p_description')->comment('商品說明');
            $table->string('p_number',25)->comment('商品編號');
            $table->integer('p_price')->default(0)->comment('定價'); 
            $table->integer('p_retailprice')->default(0)->comment('售價'); 
            $table->integer('p_specialprice')->default(0)->comment('優惠價');
            $table->integer('p_salesprice')->default(0)->comment('業務價');
            $table->text('p_category')->comment('商品分類勾選(用|分隔)'); 
            $table->boolean('showfront')->default(false)->comment('前台顯示');
            $table->string('update_user',25)->comment('最後更新者');
            $table->timestamps();
            $table->softDeletes();
              
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_index');
    }
}
