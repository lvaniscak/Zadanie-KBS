<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GenerateMenus
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
        \Menu::make('Menu', function($menu){
            if(!Auth::check()){
                $menu->add('Úvod');
                $menu->add('Registrácia', 'user/create');
                $menu->add('Porovnanie', 'hobbies/compare');
                $menu->add('Zoznam', 'user/list');
            }
            else{
                $menu->add('Dashboard', 'admin/dashboard' );
                $menu->add('Logout', 'admin/logout');
            }

        });
        return $next($request);
    }
}
