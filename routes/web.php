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
    Route::get('admin/newsletters', 'Admin\AdminController@newsletters');
    Route::get('admin/users', 'Admin\AdminController@users');
    Route::get('admin/settings', 'Admin\AdminController@settings');
    Route::post('admin/submit-settings', 'Admin\AdminController@submitSettings');
    
    Route::get('admin/brand/form/{model?}', 'Admin\BrandController@form');
    Route::post('admin/brand/submit', 'Admin\BrandController@submit');
    Route::post('admin/brand/delete', 'Admin\BrandController@delete');
    
    Route::get('admin/tag/form/{model?}', 'Admin\TagController@form');
    Route::post('admin/tag/submit', 'Admin\TagController@submit');
    Route::post('admin/tag/delete', 'Admin\TagController@delete');
    
    Route::get('admin/category/form/{model?}', 'Admin\CategoryController@form');
    Route::post('admin/category/submit', 'Admin\CategoryController@submit');
    Route::post('admin/category/delete', 'Admin\CategoryController@delete');
    
    Route::get('admin/product/form/{model?}', 'Admin\ProductController@form');
    Route::post('admin/product/submit', 'Admin\ProductController@submit');
    Route::post('admin/product/delete', 'Admin\ProductController@delete');
    
    Route::get('admin/order/form/{model?}', 'Admin\OrderController@form');
    Route::post('admin/order/submit', 'Admin\OrderController@submit');
    Route::post('admin/order/delete', 'Admin\OrderController@delete');
    
    Route::get('admin/contact/form/{model?}', 'Admin\ContactController@form');
    Route::post('admin/contact/submit', 'Admin\ContactController@submit');
    Route::post('admin/contact/delete', 'Admin\ContactController@delete');
    
    Route::get('admin/newsletter/form/{model?}', 'Admin\NewsletterController@form');
    Route::post('admin/newsletter/submit', 'Admin\NewsletterController@submit');
    Route::post('admin/newsletter/delete', 'Admin\NewsletterController@delete');
    
    Route::get('admin/user/form/{model?}', 'Admin\UserController@form');
    Route::post('admin/user/submit', 'Admin\UserController@submit');
    Route::post('admin/user/delete', 'Admin\UserController@delete');
});