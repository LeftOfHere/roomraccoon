<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/lists', ['uses' => 'ShoppingListController@getLists']);
    $router->post('/lists', ['uses' => 'ShoppingListController@createList']);
    $router->get('/lists/{listId}', ['uses' => 'ShoppingListController@getList']);
    $router->delete('/lists/{listId}', ['uses' => 'ShoppingListController@deleteList']);


    $router->get('/lists/{listId}/items', ['uses' => 'ShoppingListController@getList']);
    $router->post('/lists/{listId}/items', ['uses' => 'ShoppingListController@createListItem']);
    $router->post('/lists/{listId}/items/{itemId}', ['uses' => 'ShoppingListController@updateListItem']);
    $router->delete('/lists/{listId}/items/{itemId}', ['uses' => 'ShoppingListController@deleteListItem']);
});
