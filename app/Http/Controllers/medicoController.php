<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Medico;
use App\Models\User;
use Illuminate\Http\Request;

class medicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::all();
        $especialidades = Especialidad::all();
        return view('medicos.index',compact('medicos','especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'sexo' => 'required',
            'telefono' => 'required',

        ]);
        //validacion para que sea requerida si o si con esos datos o de lo contrario no deja llenar el form


        $medico=new Medico();
        $medico->nombre=$request->input('nombre');
        $medico->sexo=$request->input('sexo');
        $medico->telefono=$request->input('telefono');
        $medico->save();

        
        
        $usuario= new User();
        $usuario->name =$medico->nombre;
        $usuario->email =$request->input('email') ;
        $usuario->password = bcrypt($request->input('password') );
        $usuario->id_persona = $medico->id;
        $usuario->assignRole('Medico');
        $usuario->save();

        $especialidades = new Especialidad();
        $especialidades->nombre =$request->input('especialidad');
        $especialidades->id_medico = $medico->id;
        $especialidades->save();

        return redirect()->route('medicos.index', compact('medico'));
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
        $medico=medico::findOrFail($id);
        return view('medicos.edit',compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $medico = Medico::findOrFail($id);
        
        $medico->nombre = $request->input('nombre');
        $medico->telefono = $request->input('telefono');
        $medico->save();

        $user=User::where ('id_persona',$medico->id)->first();
        
        $user->name = $medico->nombre;
        $user->email = $request->input('email');

        $user->save();
        return redirect()->route('medicos.index',$medico); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $medico= Medico::findOrFail($id);

        $esp = Especialidad::where('id_medico', $medico->id);
        $esp->delete();

        $user = User::where('id_persona', $medico->id);
        $user->delete();
                
        $medico->delete();
        return redirect()->route('medicos.index');
    }
}
