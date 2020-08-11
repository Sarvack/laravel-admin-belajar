<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('demo/users', UserController::class);
    $router->resource('movie', MovieController::class);
    $router->resource('posts', PostController::class);
    $router->resource('profile', ProfileController::class);
    $router->resource('comment', CommentController::class);
});
