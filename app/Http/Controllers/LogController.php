<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
//log
use App\Events\EventUserLog;

class LogController extends Controller
{
    private $event;
    function __construct() {
        $this->middleware('auth');
        $this->middleware('permission:index_log')->only('index');
        $this->event = collect(['host' => url()->current(), 'active'=> true, 'module'=> 'Bitácora', 'controller'=>'LogController', 'remote_ip' => \Request::getClientIp()]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->event->put('user_id', auth()->user()->id);
        $this->event->put('type', 'Visitó');
        $this->event->put('method', 'index');    
        event(new EventUserLog($this->event));
        
        ini_set('memory_limit','4096M');
        set_time_limit ( 0 );
        $logs = Log::orderBy('created_at','DESC')->get();
        return \View::make('Log.index')->with(compact('logs'));
    }
}
