<?php

namespace App\Admin\Controllers;

use App\User;
use App\Models\Comment;
use App\Models\Post;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CommentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'comment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Comment);

        $grid->column('id', 'id')->sortable();
        // $grid->column('title');
        $grid->column('content');

        // $grid->column('comments', 'Comments count')->display(function ($comments) {
        //     $count = count($comments);
        //     return "<span class='label label-warning'>{$count}</span>";
        // });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $grid = new Grid(new Comment);
        $grid->column('id');
        $grid->column('post.title');
        $grid->column('content');

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Comment());

        $form->hidden('post_id')->default('1');
        $form->textarea('content', __('content'));

        return $form;
    }
}
