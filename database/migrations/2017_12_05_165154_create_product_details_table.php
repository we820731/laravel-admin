<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            
            $table->increments('pdid')->comment('商品副檔id');
            $table->integer('pid')->unsigned()->comment('主商品id');
            $table->string('pd_type',50)->comment('款式');
            $table->integer('pd_stock')->default(0)->comment('目前庫存數');
            $table->integer('pd_safestock')->default(0)->comment('安全庫存');
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
        Schema::dropIfExists('product_details');
    }
}
