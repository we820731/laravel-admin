<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_order', function (Blueprint $table) {

            $table->increments('soid')->comment('訂單id');
            $table->string('so_number',50)->comment('訂單編號');
            $table->integer('uid')->unsigned()->comment('會員id');
            $table->string('so_name',50)->comment('收件人');
            $table->string('so_address',200)->comment('收件地址');
            $table->string('so_phone',50)->comment('收件連絡電話');
            $table->string('so_status',50)->comment('訂單狀態');
            $table->string('so_paytype',25)->comment('付款方式');
            $table->integer('so_payment')->default(0)->comment('應付金額'); 
            $table->integer('so_paid')->default(0)->comment('已付金額');
            $table->timestamp('so_ordertime')->nullable()->comment('訂貨時間');
            $table->timestamp('so_paytime')->nullable()->comment('付款時間');
            $table->timestamp('so_sendtime')->nullable()->comment('出貨時間');
            $table->string('so_sendnumber',50)->comment('寄貨單號');
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
        Schema::dropIfExists('shop_order');
    }
}
