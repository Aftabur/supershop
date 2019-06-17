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

// front end route
Route::get('/','supershopController@index')->name('frontEnd.home');
Route::get('/category','supershopController@category')->name('frontEnd.category');
Route::get('/product-details/{id}','supershopController@producDetails')->name('frontEnd.productDetails');

Auth::routes();

// Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'HomeController@index');

// Backend Route

// category info
Route::get('/category/add', 'categoryController@createCategory')->name('admin.category.createCategory');
Route::post('/category/save', 'categoryController@saveCategory')->name('admin.category.saveCategory');
Route::get('/category/manage', 'categoryController@manageCategory')->name('admin.category.manageCategory');

Route::get('/category/edit/{id}', 'categoryController@editCategory')->name('admin.category.editCategory');
Route::post('/category/update', 'categoryController@updateCategory')->name('admin.category.updateCategory');
Route::get('/category/delete/{id}', 'categoryController@deleteCategory')->name('admin.category.deleteCategory');


// Manufacturer info
Route::get('/manufacturer/add', 'manufacturerController@createManufacturer')->name('admin.manufacturer.createmanufacturer');
Route::post('/manufacturer/save', 'manufacturerController@saveManufacturer')->name('admin.manufacturer.savemanufacturer');
Route::get('/manufacturer/manage', 'manufacturerController@manageManufacturer')->name('admin.manufacturer.managemanufacturer');

Route::get('/manufacturer/edit/{id}', 'manufacturerController@editManufacturer')->name('admin.manufacturer.editmanufacturer');
Route::post('/manufacturer/update', 'manufacturerController@updateManufacturer')->name('admin.manufacturer.updatemanufacturer');
Route::get('/manufacturer/delete/{id}', 'manufacturerController@deleteManufacturer')->name('admin.manufacturer.deletemanufacturer');

// product Info
Route::get('/product/add', 'ProductController@createProduct')->name('admin.product.createProduct');
Route::POST('/product/store', 'ProductController@storeProduct')->name('admin.product.storeProduct');

Route::get('/product/manage', 'ProductController@manageProduct')->name('admin.product.manageProduct');

Route::get('/product/edit/{id}', 'productController@editProduct')->name('admin.product.editProduct');
Route::post('/product/update', 'productController@updateProduct')->name('admin.product.updateProduct');
Route::get('/product/delete/{id}', 'productController@deleteProduct')->name('admin.product.deleteProduct');
Route::get('/product/view/{id}', 'productController@viewProduct')->name('admin.product.viewProduct');

// product image upload
Route::get('/imagepart/add', 'productImageController@createImageUpload')->name('admin.product.createimageupload');
Route::POST('/imagepart/store', 'productImageController@storeImageUpload')->name('admin.product.storeImageUpload');
Route::get('/imagepart/manage', 'productImageController@manageImageUpload')->name('admin.product.manageImageUpload');
Route::get('/imagepart/edit/{id}', 'productImageController@editImageUpload')->name('admin.product.editImageUpload');
