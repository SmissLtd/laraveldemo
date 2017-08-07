<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication
Auth::routes();

// Client pages
Route::get('/', 'SiteController@index');
Route::get('contact', 'SiteController@contact');
Route::get('category/{category?}', 'ProductController@category');
Route::get('brand/{brand}', 'ProductController@brand');
Route::get('tag/{tag}', 'ProductController@tag');
Route::get('product/{product}', 'ProductController@product');
Route::get('checkout', 'ProductController@checkout');
Route::post('addToCart', 'ProductController@addToCart');
Route::post('emptyCart', 'ProductController@emptyCart');
Route::post('buy', 'ProductController@buy');
Route::get('buy', 'ProductController@buy');
Route::post('buy2', 'ProductController@buy2');
Route::post('contact-submit', 'SiteController@contactSubmit');
Route::post('search', 'ProductController@search');
Route::post('newsletter', 'SiteController@newsletter');

// Admin pages
Route::middleware(['admin'])->group(function() {
    Route::get('admin', 'Admin\AdminController@index');
    Route::get('admin/brands', 'Admin\AdminController@brands');
    Route::get('admin/tags', 'Admin\AdminController@tags');
    Route::get('admin/categories', 'Admin\AdminController@categories');
    Route::get('admin/products', 'Admin\AdminController@products');
    Route::get('admin/orders', 'Admin\AdminController@orders');
    Route::get('admin/contacts', 'Admin\AdminController@contacts');
    Route::get('admin/newslatters', 'Admin\AdminController@newslatters');
    Route::get('admin/users', 'Admin\AdminController@users');
    Route::get('admin/settings', 'Admin\AdminController@settings');
    
    Route::get('admin/brand/form/{model?}', 'Admin\BrandController@form');
    Route::post('admin/brand/submit', 'Admin\BrandController@submit');
    Route::post('admin/brand/delete', 'Admin\BrandController@delete');
    
    Route::get('admin/tag/form/{model?}', 'Admin\TagController@form');
    Route::post('admin/tag/submit', 'Admin\TagController@submit');
    Route::post('admin/tag/delete', 'Admin\TagController@delete');
});