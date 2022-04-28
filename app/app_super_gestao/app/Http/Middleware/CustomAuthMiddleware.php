<?php

namespace App\Http\Middleware;

use Closure;

// Middleware responsável por controlar o acesso à área restrita
// somente usuários logados terão acesso
class CustomAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // iniciando a sessão
        session_start();

        // se existir um email associado à sessão
        if(isset($_SESSION['email']) and $_SESSION['email'] != ''){
            
            // permite o acesso
            return $next($request);
        }
        // senão
        else{

            // renderiza a view login, passando o código de erro de área restrita
            return redirect()->route('site.login', ['error' => 2]);
        }

    }
}
