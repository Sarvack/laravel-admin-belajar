<?php

namespace App\Admin\Controllers;

use App\Models\Profile;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProfileController extends AdminController
{

    protected $title = 'Profile';

    protected function grid()
    {
        $grid = new Grid(new Profile());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User ID'));
        $grid->column('age', __('age'));
        $grid->column('gender', __('gender'));
        $grid->column('user.name', __('username'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(Profile::findOrFail($id));
        $show->author('Author information', function ($pengguna) {

            $pengguna->setResource('/admin/users');

            $pengguna->id();
            $pengguna->name();
            $pengguna->email();
        });

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User'));
        $grid->column('age', __('age'));
        $grid->column('gender', __('gender'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Profile());

        $form->hidden('user_id')->default('1');
        $form->number('age', __('age'));
        $form->text('gender', __('gender'));
        $form->text('user.name');
        $form->text('user.email');
        $form->hidden('user.password')->default('password');

        return $form;
    }

}
