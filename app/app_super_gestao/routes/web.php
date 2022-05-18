<?php

use Illuminate\Support\Facades\Route;

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

// arquivo de configuração de rotas da aplicação web tradicional,
// com páginas renderizadas pelo backend

// rotas públicas (sem necessidade de login)
// rota para o index da aplicação
Route::get('/', 'IndexController@index')->name('site.index');
// rota para a página sobre nós
Route::get('/about', 'AboutController@about')->name('site.about');
// rota para a página contato
Route::get('/contact', 'ContactController@contact')->name('site.contact');
Route::post('/contact', 'ContactController@save')->name('site.contact');
// rota para a página login
// quando a requisição for get, possui atributo opcional error
Route::get('/login{error?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@login')->name('site.login');

// rotas privadas agrupadas (com necessidade de login)
// agrupando as rotas no prefixo /app
Route::prefix('/app')->middleware('customauth')->group(function () {
    // rota para a página home
    Route::get('/home', 'HomeController@index')->name('app.home');
    // rota para a página logout
    Route::get('/logout', 'LoginController@logout')->name('app.logout');
    
    // rotas para as páginas de provider
    Route::get('/provider', 'ProviderController@index')->name('app.provider');
    Route::get('/provider/list', 'ProviderController@list')->name('app.provider.list');
    Route::post('/provider/list', 'ProviderController@list')->name('app.provider.list');
    Route::get('/provider/add', 'ProviderController@add')->name('app.provider.add');
    Route::post('/provider/add', 'ProviderController@add')->name('app.provider.add');
    // atributo id obrigatório, msg opcional
    Route::get('/provider/edit/{id}/{msg?}', 'ProviderController@edit')->name('app.provider.edit');
    Route::get('/provider/delete/{id}', 'ProviderController@delete')->name('app.provider.delete');

    // rotas para as ações de ProductController
    // como o controller foi criado com resources, as rotas podem ser configuradas de forma simplificada
    // esta configuração usa os verbos http mais apropriados para cada ação
    Route::resource('product', 'ProductController');

    // rotas para as ações de ProductDetailController
    // como o controller foi criado com resources, as rotas podem ser configuradas de forma simplificada
    // esta configuração usa os verbos http mais apropriados para cada ação
    Route::resource('product_detail', 'ProductDetailController');

    // rotas para as ações de ClientController
    // como o controller foi criado com resources, as rotas podem ser configuradas de forma simplificada
    // esta configuração usa os verbos http mais apropriados para cada ação
    Route::resource('client', 'ClientController');

    // rotas para as ações de OrderController
    // como o controller foi criado com resources, as rotas podem ser configuradas de forma simplificada
    // esta configuração usa os verbos http mais apropriados para cada ação
    Route::resource('order', 'OrderController');

    // rotas para as ações de OrderProductController
    // como o controller foi criado com resources, as rotas podem ser configuradas de forma simplificada
    // esta configuração usa os verbos http mais apropriados para cada ação
    // foi necessário customizar as rotas para permitir a implementação
    Route::get('/order_product/create/{order}', 'OrderProductController@create')->name('order_product.create');
    Route::post('/order_product/store/{order}', 'OrderProductController@store')->name('order_product.store');
});

// definindo a rota de fallback, que será utilizada em rotas não existentes
Route::fallback(function () {
    return 'A rota acessada não existe.<a href="' . route('site.index') . '">Retorne para o início.</a>';
});
