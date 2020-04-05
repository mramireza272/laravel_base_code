<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
use DB;
//log
use App\Events\EventUserLog;

class UserController extends Controller
{
    private $event;
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create_user')->only(['create', 'store']);
        $this->middleware('permission:index_user')->only('index');
        $this->middleware('permission:edit_user')->only(['edit', 'update']);
        $this->middleware('permission:show_user')->only('show');
        $this->middleware('permission:delete_user')->only('destroy');
        $this->event = collect(['host' => url()->current(), 'active'=> true, 'module'=> 'Usuarios', 'controller'=>'UserController', 'remote_ip' => \Request::getClientIp()]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->event->put('user_id', auth()->user()->id);
        $this->event->put('type', 'Visitó Listado');
        $this->event->put('method', 'index');    
        event(new EventUserLog($this->event));
        
        $users = User::orderBy('name');
        
        if(\Auth::user()->hasRole(['Administrador'])){
            $users = $users;
        }elseif(auth()->user()->roles->first()->id == 2){
            $users = $users->where('id','!=',1);
        }else{
            $users->whereNotIn('id',[1,2]);
        }
        $users = $users->paginate(12);
        $search = "";
        
        return view('Users.index', compact('users', 'search'));
    }

    private function getRoles(){
        if(\Auth::user()->hasRole(['Administrador'])){
            $roles = Role::get();
        }elseif(auth()->user()->roles->first()->id == 2){
            $roles = Role::where('id','!=',1)->get();
        }else{
            $roles = Role::where('name',auth()->user()->roles->first()->name)->get();
        }
        $roles = $roles->pluck('name', 'id');
        return $roles;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->event->put('user_id', auth()->user()->id);
        $this->event->put('type', 'Visitó Crear Nuevo');
        $this->event->put('method', 'create');    
        event(new EventUserLog($this->event));

        $roles = $this->getRoles();
        return view('Users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {   
        $input = $request->except(['roles']);
        $user = User::create($input);        
        $user->assignRole($request->input('roles'));

        $this->event->put('user_id', auth()->user()->id);
        $this->event->put('type', 'Creó Nuevo');     
        $this->event->put('request', $request->all());
        $this->event->put('create_id', $user->id);
        $this->event->put('method', 'store'); 
        event(new EventUserLog($this->event));

        return redirect()->route('usuarios.index')->with('info', 'Usuario(a) creado(a) satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->event->put('user_id', auth()->user()->id);
        $this->event->put('type', 'Visitó Editar');
        $this->event->put('method', 'edit');  
        event(new EventUserLog($this->event));

        $user = User::findOrFail($id);
        $roles = $this->getRoles();
        $btnText = 'Actualizar';        
        return view('Users.edit', compact('user', 'roles', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->except(['roles']);
        $user->update($input);

        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));

        $this->event->put('user_id', auth()->user()->id);
        $this->event->put('request', $request->all());
        $this->event->put('method', 'update'); 
        $this->event->put('before', $user);
        $this->event->put('type', 'Editó');
        event(new EventUserLog($this->event));

        return redirect()->route('usuarios.index')->with('info', 'Usuario(a) '.$user->email.' actualizado(a) satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->update(['created_by' => \Auth::user()->id, 'active' => false]);

        $this->event->put('user_id', auth()->user()->id);
        $this->event->put('type', 'Eliminó');
        $this->event->put('method', 'delete');  
        event(new EventUserLog($this->event));
        
        return redirect()->route('usuarios.index')->with('info', 'Usuario(a) deshabilitado(a) satisfactoriamente.');
    }

    public function search(Request $request) {
        $users = User::where([
                            ['active', true],
                            ['name', 'ilike', '%'. $request->search .'%'],
                        ])->orWhere([
                            ['active', true],
                            ['email', 'ilike', '%'. $request->search .'%'],
                        ]);

        if(\Auth::user()->hasRole(['Administrador'])){
            $users = $users;
        }elseif(auth()->user()->roles->first()->id == 2){
            $users = $users->where('id','!=',1);
        }else{
            $users->whereNotIn('id',[1,2]);
        }
        $users = $users->orderBy('name')
            ->paginate(12);
        $search = $request->search;
        return view('Users.index', compact('users', 'search'));
    }
}