<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductHotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_hot', function (Blueprint $table) {
            $table->increments('phid')->comment('熱門商品id');
            $table->string('ph_name',50)->comment('熱門商品名稱');
            $table->integer('ph_sort')->default(0)->comment('順序');
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
        Schema::dropIfExists('product_hot');
    }
}
