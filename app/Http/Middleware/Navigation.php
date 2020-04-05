<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Navigation
{
    private $menus;

    function __construct(){

        $url = str_replace(url('/'),'',url()->current());

        if(Auth::check()){
            if(Auth::user()->hasPermissionTo('index_home')){
                $this->menus = [
                    'Inicio'    => [
                        'url'     => url('/home'),
                        'active'  => ($url == '')?' class="active-sub"':'',
                        'icon'    => 'fas fa-home',
                    ],
                ];
            }


            if(Auth::user()->hasPermissionTo('index_log')){
                $this->menus['Bitácora'] = [
                    'url'     => route('bitacora.index'),
                    'active' => (strpos($url,str_replace(url('/'),'','/bitacora')) !== false)?' class="active-sub"':'',
                    'icon'   => 'fas fa-book'
                ];
            }

            if(Auth::user()->hasPermissionTo('index_user')){
                $this->menus['Usuarios'] = [
                    'url'    => url('/usuarios'),
                    'active' => (strpos($url,str_replace(url('/'),'','/usuarios')) !== false)?' class="active-sub"':'',
                    'icon'   => 'fas fa-users'
                ];
            }

            if(Auth::user()->hasPermissionTo('index_roles')){
                $this->menus['Roles'] = [
                    'url'    => url('/roles'),
                    'active' => (strpos($url,str_replace(url('/'),'','/roles')) !== false)?' class="active-sub"':'',
                    'icon'   => 'fa fa-user-circle'
                ];

                $this->menus['Permisos'] = [
                    'url'    => url('/permisos'),
                    'active' => (strpos($url,str_replace(url('/'),'','/permisos')) !== false)?' class="active-sub"':'',
                    'icon'   => 'fas fa-key'
                ];
            }
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $menu = collect($this->menus);
        \Session::put('Current.menu',$menu);
        return $next($request);
    }
}
