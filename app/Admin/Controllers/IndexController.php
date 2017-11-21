<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Form;

use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Widgets\Table;


class IndexController extends Controller
{
    public function index()
    {


        return Admin::content(function (Content $content) {

        	$content->header('測試頁面');
        	$content->description('.....');
			//$content->body(view('admin.charts.bar'));
			

			//顯示資訊格
			$content->row(function ($row) {
                $row->column(3, new InfoBox('新用戶', 'users', 'aqua', '/admin/users', '1024'));
                $row->column(3, new InfoBox('新訂單', 'shopping-cart', 'green', '/admin/orders', '150%'));
                $row->column(3, new InfoBox('Articles', 'book', 'yellow', '/admin/articles', '2786'));
                $row->column(3, new InfoBox('Documents', 'file', 'red', '/admin/files', '698726'));
            });
        			
       
        });


    }


}
