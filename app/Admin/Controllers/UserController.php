<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Models\TWArea;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Widgets\Table;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('會員管理');
            $content->description('會員列表');
            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('編輯');
            $content->description('編輯會員資料');

            $content->body($this->form()->edit($id));

        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content  $content) {

            $content->header('新增會員');
            $content->description('增加新會員');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(User::class, function (Grid $grid) {

            $grid->id('會員編號')->sortable();
            $grid->column('username', '用戶名');
            $grid->column('name', '姓名');
            $grid->columns('email'); 
            
            $grid->created_at('建立時間');
            $grid->updated_at('更新時間');

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(User::class, function (Form $form) {

            $form->model()->makeVisible('password');

            $form->tab('基本資料', function (Form $form) {
                $form->display('id','會員編號');
                $form->text('username', trans('admin.username'))->rules('required');
                $form->text('name', trans('admin.name'))->rules('required');
                //$form->image('avatar', trans('admin.avatar'));

                $form->email('email')->rules('required');
                $form->password('password', trans('admin.password'))->rules('required|confirmed')->default(function ($form) {
                    return $form->model()->password;
                });
                $form->password('password_confirmation', trans('admin.password_confirmation'))->rules('required')
                ->default(function ($form) {
                    return $form->model()->password;});
                $form->ignore(['password_confirmation']
                );
                
                $form->display('created_at', trans('admin.created_at'));
                $form->display('updated_at', trans('admin.updated_at'));


            })->tab('聯絡資訊', function (Form $form) {

                //$form->select('address');
               //$form->select('地址')->options([1 => 'foo', 2 => 'bar', 'val' => 'Option name']);
               //$form->mobile('phone','電話');
                //$form->text('address.address');
            });
            

            $form->saving(function (Form $form) {
                if ($form->password && $form->model()->password != $form->password) {
                    $form->password = bcrypt($form->password);
                }
            });
        });
    }
    protected function edit_form()
    {
        return Admin::form(User::class, function (Form $form) {

            $form->model()->makeVisible('password');

            $form->tab('基本資料', function (Form $form) {
                $form->display('id','會員編號');
                $form->display('username', trans('admin.username'));
                $form->text('name', trans('admin.name'))->rules('required');
                //$form->image('avatar', trans('admin.avatar'));

                $form->email('email')->rules('required');
                $form->password('password', trans('admin.password'))->rules('required|confirmed')->default(function ($form) {
                    return $form->model()->password;
                });
                $form->password('password_confirmation', trans('admin.password_confirmation'))->rules('required')
                ->default(function ($form) {
                    return $form->model()->password;
                });
                $form->ignore(['password_confirmation']);

                $form->display('created_at', trans('admin.created_at'));
                $form->display('updated_at', trans('admin.updated_at'));


            })->tab('聯絡資訊', function (Form $form) {

                //$form->select('address');
               //$form->select('地址')->options([1 => 'foo', 2 => 'bar', 'val' => 'Option name']);
               // $form->mobile('phone','電話');
                //$form->text('address.address');
            });
            

            $form->saving(function (Form $form) {
                if ($form->password && $form->model()->password != $form->password) {
                    $form->password = bcrypt($form->password);
                }
            });
        });
    }    
}
