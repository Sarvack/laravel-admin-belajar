<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->row(Dashboard::title())
            // ->header('page header')
            ->breadcrumb(
                ['text' => 'Dashboard', 'url' => '/admin'],
                ['text' => 'User management', 'url' => '/admin/users'],
                ['text' => 'Edit user']
            )
            // ->body('hello world')
            // ->row('hello world')
            // ->row(function(Row $row) {
            //     $row->column(4, function (Column $column) {
            //         $column->append(Dashboard::environment());
            //     });
            // })
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });

    }
}
