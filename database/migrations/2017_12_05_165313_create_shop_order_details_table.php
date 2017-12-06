<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_order_details', function (Blueprint $table) {

            $table->increments('sodid')->comment('訂單商品明細id');
            $table->integer('soid')->unsigned()->comment('訂單id');
            $table->integer('pdid')->unsigned()->comment('商品副檔id');
            $table->string('sod_name',50)->comment('商品名稱');
            $table->string('sod_pic',100)->comment('商品主圖');
            $table->string('sod_type',50)->comment('款式');
            $table->integer('sod_quantity')->default(0)->comment('數量');
            $table->integer('sod_unitprice')->default(0)->comment('單價');
            $table->integer('sod_amount')->default(0)->comment('總價');
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
        Schema::dropIfExists('shop_order_details');
    }
}
