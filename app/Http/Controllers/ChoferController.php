<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use App\Models\User;
use Illuminate\Http\Request;

class ChoferController extends Controller
{
    public function index()
    {
        $choferes = Chofer::all();
        return view('choferes.index', compact('choferes'));
    }

    public function create()
    {
        return view('choferes.create');
    }

    public function store(Request $request)
    {
        
        //validacion para que sea requerida si o si con esos datos o de lo contrario no deja llenar el form


        $chofer = new Chofer();
        $chofer->nombre = $request->input('nombre');
        $chofer->sexo = $request->input('sexo');
        $chofer->telefono = $request->input('telefono');
        $chofer->ci = $request->input('ci');
        $chofer->fecha_nac = $request->input('fecha_nac');
        $chofer->save();

       
        $usuario = new User();
        $usuario->name = $chofer->nombre;
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->cargo = 'Chofer';
        $usuario->cod_chofer = $chofer->id;
        $usuario->assignRole('Chofer');
        $usuario->save();

       


        return redirect()->route('choferes.index');
    }

    public function edit($id)
    {
        $chofer = Chofer::findOrFail($id);
        return view('choferes.edit', compact('chofer'));
    }

    public function update(Request $request, $id)
    {
        $chofer = Chofer::findOrFail($id);

        $chofer->nombre = $request->input('nombre');
        $chofer->telefono = $request->input('telefono');
        $chofer->sexo = $request->input('sexo');
        $chofer->ci = $request->input('ci');
        $chofer->fecha_nac = $request->input('fecha_nac');
        $chofer->save();

        $user = User::where('cod_chofer', $chofer->id)->first();

        $user->name = $chofer->nombre;;
        $user->save();
        
        return redirect()->route('choferes.index');
    }

    public function destroy($id)
    {

        $Chofer= Chofer::findOrFail($id);

        $user = User::where('cod_chofer', $Chofer->id);
        $user->delete();
                
        $Chofer->delete();
        return redirect()->route('choferes.index');
    }


}
