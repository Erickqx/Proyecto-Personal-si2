<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
        //
    }

    public function create()
    {
        $permisos = Permission::all();
        return view('roles.create', compact('permisos'));
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|unique:roles'
        ]);
        $rol = new Role();
        $rol->name=$request->name;
        $rol->save();
        /* return $rol; */
        $rol->syncPermissions($request->permisos);
        return redirect()->route('roles.index');
        
    }

    public function show($id)
    {
        return view('roles.show', compact('role'));
        //
    }


    public function edit(Role $role)
    {
        $permisos = Permission::all();
        $permisoArray = array();

        foreach ($permisos as $permiso) {
            $p = json_decode($permiso, true);
            array_push($permisoArray, $p['name']);
        }

        $per = $role->getPermissionNames();
        $perA = json_decode($per, true);

        return view('roles.edit', compact('role', 'permisos', 'permisoArray', 'per', 'perA'));
         //
    }

    public function update(Request $request, Role $role)
    {
        $this->validate($request,[
            'name'=> "required|unique:roles,name,$role->id",
            'name'=> "required|unique:roles,guard_name,$role->id",
        ]);
        $role = Role::findOrFail($role->id);
        $role->name = $request->name;
        $role->syncPermissions($request->permisos);

        $role->save();
        return redirect()->route('roles.index');
        
    }

    public function destroy(Role $role)
    {
        
        Role::destroy($role->id);
        return redirect('roles');
    }
}
