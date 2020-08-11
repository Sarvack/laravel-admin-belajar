<?php

namespace App\Admin\Controllers;

use App\Models\Post;
use App\Models\Movie;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PostController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Posts';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Movie());

        $grid->column('id', __('Id'));
        $grid->column('author_id', __('Author at'));
        $grid->column('content', __('Content'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Movie::findOrFail($id));
        $show->author('Author information', function ($author) {

            $author->setResource('/admin/users');

            $author->id();
            $author->name();
            $author->email();
        });

        $grid->column('id', __('Id'));
        $grid->column('author_id', __('Author'));
        $grid->column('content', __('Content'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Movie());

        $form->select('author_id', __('Author'))
        ->options(Post::all()->pluck('name', 'id'))
        ->rules('required');
        $form->text('user.name');
        // $form->select('user_id', __('Author'))->options([1 => '', 2 => 'bar', 'val' => 'Option name']);
        $form->number('director', __('Director'));
        $form->textarea('describe', 'Describe');
        $form->rate('rate', 'Rate');
        // $form->select('released','Released')->options([1 => 'drafted', 2 => 'published', ]);
        $form->datetime('released_at', __('released_at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
