<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRubbishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_rubbish', function (Blueprint $table) {
            $table->increments('prid')->comment('報廢品id');
            $table->string('pr_name',50)->comment('報廢商品名稱');
            $table->string('pr_pic',100)->comment('報廢商品主圖');
            $table->text('pr_description')->comment('報廢商品說明');
            $table->string('pr_number',25)->comment('報廢商品編號');
            $table->string('pr_type',50)->comment('款式');
            $table->integer('pr_quantity')->default(0)->comment('報廢數量');
            $table->boolean('showfront')->default(false)->comment('前台顯示');
            $table->string('update_user',25)->comment('最後更新者');
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
        Schema::dropIfExists('product_rubbish');
    }
}
