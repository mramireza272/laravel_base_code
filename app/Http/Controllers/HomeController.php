<?php

namespace App\Http\Controllers;

use App\Events\EventUserLog;
use Carbon\Carbon;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $event;
    public function __construct()
    {
        $this->middleware('auth');
        $this->event = collect(['host' => url()->current(), 'active'=> true, 'module'=> 'Inicio', 'controller'=>'HomeController', 'remote_ip' => \Request::getClientIp()]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        
        $this->event->put('user_id', auth()->user()->id);
        $this->event->put('type', 'Visitó');
        $this->event->put('method', 'index');    
        event(new EventUserLog($this->event));

        return view('home');
    }

}
