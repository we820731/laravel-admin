<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_log', function (Blueprint $table) {
            
            $table->increments('plid')->comment('庫存變更紀錄id');
            $table->integer('pdid')->unsigned()->comment('商品副檔id');
            $table->integer('pl_calculate')->default(1)->comment('增=1/減=-1');
            $table->integer('pl_count')->default(0)->comment('數量');
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
        Schema::dropIfExists('product_log');
    }
}
