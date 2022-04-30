<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\User;

class pacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index',compact('pacientes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $paciente=new Paciente();
        $paciente->ci=$request->input('ci');
        $paciente->nombre=$request->input('nombre');
        $paciente->sexo=$request->input('sexo');
        $paciente->telefono=$request->input('telefono');
        $paciente->direccion=$request->input('direccion');

        $paciente->save();
        
        $usuario= new User();
        $usuario->name =$paciente->nombre;
        $usuario->email =$request->input('email') ;
        $usuario->password = bcrypt($request->input('password') );
        $usuario->id_persona = $paciente->id;
        $usuario->assignRole('Paciente');
        $usuario->save();

        return redirect()->route('pacientes.index', compact('paciente'));
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
        $paciente=Paciente::findOrFail($id);
        $user=User::where ('id_persona',$paciente->id)->first();
        return view('pacientes.edit',compact('paciente','user'));
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
        $paciente = Paciente::findOrFail($id);

        
        $paciente->ci = $request->input('ci');
        $paciente->nombre = $request->input('nombre');
        $paciente->sexo = $request->input('sexo');
        $paciente->telefono = $request->input('telefono');
        $paciente->direccion = $request->input('direccion');
        $paciente->save();

        $user=User::where ('id_persona',$paciente->id)->first();
        
        $user->name = $paciente->nombre;
        $user->email = $request->input('email');

        $user->save();
        return redirect()->route('pacientes.index',$paciente); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente= Paciente::findOrFail($id);

        $user = User::where('id_persona', $paciente->id);
        $user->delete();
                
        return redirect()->route('pacientes.index');
    }
}
