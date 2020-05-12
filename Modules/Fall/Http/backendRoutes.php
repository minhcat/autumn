<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/fall'], function (Router $router) {
    $router->bind('green', function ($id) {
        return app('Modules\Fall\Repositories\GreenRepository')->find($id);
    });
    $router->get('greens', [
        'as' => 'admin.fall.green.index',
        'uses' => 'GreenController@index',
        'middleware' => 'can:fall.greens.index'
    ]);
    $router->get('greens/create', [
        'as' => 'admin.fall.green.create',
        'uses' => 'GreenController@create',
        'middleware' => 'can:fall.greens.create'
    ]);
    $router->post('greens', [
        'as' => 'admin.fall.green.store',
        'uses' => 'GreenController@store',
        'middleware' => 'can:fall.greens.create'
    ]);
    $router->get('greens/{green}/edit', [
        'as' => 'admin.fall.green.edit',
        'uses' => 'GreenController@edit',
        'middleware' => 'can:fall.greens.edit'
    ]);
    $router->put('greens/{green}', [
        'as' => 'admin.fall.green.update',
        'uses' => 'GreenController@update',
        'middleware' => 'can:fall.greens.edit'
    ]);
    $router->delete('greens/{green}', [
        'as' => 'admin.fall.green.destroy',
        'uses' => 'GreenController@destroy',
        'middleware' => 'can:fall.greens.destroy'
    ]);
// append

});
