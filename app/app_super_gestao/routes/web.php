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
Route::post('/contact', 'ContactController@contact')->name('site.contact');
// rota para a página login
Route::get('/login', function () {
    return 'Login';
})->name('site.login');

// rotas privadas agrupadas (com necessidade de login)
// agrupando as rotas no prefixo /app
Route::prefix('/app')->group(function () {
    // rota para a página client
    Route::get('/client', function () {
        return 'Cliente';
    })->name('app.client');
    // rota para a página provider
    Route::get('/provider', 'ProviderController@index')->name('app.provider');
    // rota para a página product
    Route::get('/product', function () {
        return 'Produto';
    })->name('app.product');
});

// definindo a rota de fallback, que será utilizada em rotas não existentes
Route::fallback(function () {
    return 'A rota acessada não existe.<a href="' . route('site.index') . '">Retorne para o início.</a>';
});
