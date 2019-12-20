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

//Route::view('/Index','welcome',['welcome'=>'hello']);


//Route::view('Index','Index');
//get路由
//Route::get('/test','index\Testcontroller@index')->name('DO');

//Route::post('/test/create','index\Testcontroller@create');
//Route::get('/goods/{id}/{name}','index\Testcontroller@goods');
//Route::get('/goods/{id}/{name}',function($id,$goodsname) {
//    echo $id.'<br>';
//    echo $goodsname;
//});
//可选参数
// Route::get('/goods/{id}/{name?}','index\Testcontroller@goods');
//正则约束
//Route::get('/goods/{id}/{name}','Index\Testcontroller@goods')->where(['id'=>'\d+','name'=>'\w+']);
//登录页面
Route::prefix('/login')->group(function() {
        Route::get('index','Admin\LoginController@index');//列表
        Route::any('create','Admin\LoginController@create');//添加列表
//    Route::any('logindo','Admin\LoginController@logindo');//添加列表


});

//后台 品牌项目 增删改查
Route::prefix('brand')->group(function(){
    Route::get('/','Admin\BrandController@index');
    Route::any('create','Admin\BrandController@create');//添加列表
    Route::any('store','Admin\BrandController@store');//执行添加
    Route::any('delete/{id}','Admin\BrandController@destroy');//执行删除
    Route::any('edit/{id}','Admin\BrandController@edit');//修改展示页面
    Route::any('update/{id}','Admin\BrandController@update');//修改展示页面
    Route::any('checkonly','Admin\BrandController@checkonly');//修改展示页面

});
//商品
Route::prefix('/goods')->group(function(){
    Route::get('/index','Admin\GoodsController@index');//商品列表展示
    Route::any('create','Admin\GoodsController@create');//执行注册
    Route::any('store','Admin\GoodsController@store');//执行添加
    Route::get('delete/{id}','Admin\GoodsController@destroy');//执行删除

});
//管理员
Route::prefix('/admin')->group(function(){
    Route::any('index','Admin\AdminController@index');//列表
    Route::any('create','Admin\AdminController@create');//添加页面
    Route::any('store','Admin\AdminController@store');//添加
    Route::any('delete/{id}','Admin\AdminController@destroy');//删除
    Route::any('edit/{id}','Admin\AdminController@edit');//修改页面
    Route::any('update/{id}','Admin\AdminController@update');//修改

});
//分类
Route::prefix('/cate')->group(function(){
    Route::any('index','Admin\CateController@index');//列表
    Route::any('create','Admin\CateController@create');
    Route::any('store','Admin\CateController@store');
    Route::any('delete/{id}','Admin\CateController@destroy');
    Route::any('edit/{id}','Admin\CateController@edit');
    Route::any('update/{id}','Admin\CateController@update');
});
//内测
//Route::prefix('/logindo')->group(function() {
//    Route::get('index','Admin\LogindoController@index');//列表
//    Route::any('create','Admin\LogindoController@create');//添加列表

//});
Route::prefix('/class')->group(function(){
    Route::any('index','Admin\ClassController@index');
    Route::any('create','Admin\ClassController@create');
    Route::any('show','Admin\ClassController@show');
    Route::any('delete/{id}','Admin\ClassController@destroy');
    Route::any('edit/{id}','Admin\ClassController@edit');
    Route::any('update/{id}','Admin\ClassController@update');//修改


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('hoddddme');


//前台
Route::get('/','Index\IndexController@index');
Route::get('/login','Index\IndexController@login');
Route::post('/logindo','Index\IndexController@logindo');
Route::get('/reg','Index\IndexController@reg');
Route::post('/regd','Index\IndexController@regd');
Route::any('/proinfo/{id}','Index\IndexController@proinfo');//商品详情页
Route::any('/prolist','Index\IndexController@prolist');//分类页面
Route::any('/car/{id}','Index\IndexController@car')->middleware('IndexLogin');//购物车页面
Route::any('/pay/{orderid}','Index\OrderController@pay');
Route::any('/success','Index\IndexController@success');





