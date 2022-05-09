<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
            'roles'=>'required',
            
        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt(($request->password));
        $usuario->save();
        $usuario->roles()->sync($request->roles);

        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Usuarios')->log('Registró')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $usuario->id;
        $lastActivity->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }


    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $rol = DB::table('model_has_roles')->where('model_id', $user->id)->first();
        $rol_name = DB::table('roles')->where('id', $rol->role_id)->first();
        return view('users.edit', compact('user', 'roles', 'rol', 'rol_name'));   
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=> "unique:users,name,$user->id",
            'roles'=>'required'
        ]);

        $usuario = User::find($user->id);
        if($usuario->name <> $request->name){
            $usuario->name = $request->name;
        }
        if($request->password <> ''){
            $usuario->password = bcrypt(($request->password));
        }
        $usuario->save();
        $usuario->roles()->sync($request->roles);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('users');
    }
}