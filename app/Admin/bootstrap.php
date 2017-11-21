<?php
use App\Admin\Extensions\Form\CKEditor;
use Encore\Admin\Form;
use Encore\Admin\Facades\Admin;
/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

Encore\Admin\Form::forget(['map', 'editor']);

Form::extend('ckeditor', CKEditor::class);
//引入插件
//Admin::js('/vendor/chartjs/src/chart.js');


Admin::navbar(function (\Encore\Admin\Widgets\Navbar $navbar) {
	//左側加入搜尋
	$navbar->left(view('search-bar'));
	//右側加入圖示
	$navbar->right(new \App\Admin\Extensions\Nav\Links()); 

});