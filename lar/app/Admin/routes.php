<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
    'as' => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('/slider', 'SliderController');
    $router->resource('/introduce', 'IntroduceController');
    $router->resource('/category', 'CategoryController');
    $router->resource('/product-category', 'ProductCategoryController');
    $router->resource('/product', 'ProductController');
    $router->resource('/client-benefit', 'BenefitController');
    $router->resource('/service', 'ServiceController');
    $router->resource('/workflow', 'WorkflowController');
    $router->resource('/news-category', 'NewsCategoryController');
    $router->resource('/news', 'NewsController');
    $router->resource('/partner', 'PartnerController');
    $router->resource('/home-section', 'HomeSectionController');
    $router->resource('/contact', 'ContactController');
    $router->resource('/contact-reply', 'ContactReplyController');
});
