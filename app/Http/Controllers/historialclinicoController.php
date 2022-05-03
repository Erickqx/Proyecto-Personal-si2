<?php

namespace App\Http\Controllers;

use App\Models\AnteFamiliar;
use App\Models\AnteNoPatologico;
use App\Models\AntePatologico;
use App\Models\Historialclinico;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;

class historialclinicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historias = Historialclinico::all();
        $pacientes = Paciente::all();

        return view('historias.index', compact('historias', 'pacientes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('historias.create', compact('pacientes','medicos'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $antenopat = new AnteNoPatologico();
        $antenopat->alcohol = $request->alcohol;
        $antenopat->tabaquismo = $request->tabaquismo;
        $antenopat->drogas = $request->drogas;
        $antenopat->inmunizaciones = $request->inmunizaciones;
        $antenopat->otros = $request->otros;
        $antenopat->save();

        $antepat = new AntePatologico();
        $antepat->cardiologicos = $request->cardiologicos;
        $antepat->pulmunares = $request->pulmunares;
        $antepat->digestivos = $request->digestivos;
        $antepat->diabetes = $request->diabetes;
        $antepat->renales = $request->renales;
        $antepat->quirurgicos = $request->quirurgicos;
        $antepat->alergicos = $request->alergicos;
        $antepat->medicamentos = $request->medicamentos;
        $antepat->transfuciones = $request->transfuciones;
        $antepat->save();

        $anteFam = new AnteFamiliar();
        $anteFam->padre = $request->padre;
        $anteFam->madre = $request->madre;
        $anteFam->save();

        $historialclin = new Historialclinico();
        $historialclin->descripcion = $request->descripcion;
        $historialclin->gruposanguineo = $request->gruposanguineo;
        $historialclin->ocupacion = $request->ocupacion;
        $historialclin->nombredoctor = $request->nombredoctor;
        $historialclin->ultimaconsulta = $request->ultimaconsulta;
        $historialclin->id_paciente = $request->id_paciente;
        $historialclin->id_ante_patologicos_ = $antepat->id;
        $historialclin->id_antenopatologico = $antenopat->id;
        $historialclin->id_antefamiliares = $anteFam->id;
        $historialclin->save();


        return redirect()->route('historias.index');
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
        $historialclin = Historialclinico::find($id);
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        $antenopat = AnteNoPatologico::where('id',$historialclin->id_antenopat)->first();
        $antepat = AntePatologico::where('id',$historialclin->id_antepat)->first();
        $anteFam = AnteFamiliar::where('id',$historialclin->id_anteFam)->first();

        return view('historias.edit', compact('historialclin','antenopat','antepat','anteFam','medicos','pacientes'));
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
        $historialclin = Historialclinico::find($id);

        $antenopat = AnteNoPatologico::where('id',$historialclin->id_antenopat);
        $antenopat->alcohol = $request->alcohol;
        $antenopat->tabaquismo = $request->tabaquismo;
        $antenopat->drogas = $request->drogas;
        $antenopat->inmunizaciones = $request->inmunizaciones;
        $antenopat->otros = $request->otros;
        $antenopat->save();

        $antepat = AnteNoPatologico::where('id',$historialclin->id_antepat);
        $antepat->cardiologicos = $request->cardiologicos;
        $antepat->pulmunares = $request->pulmunares;
        $antepat->digestivos = $request->digestivos;
        $antepat->diabetes = $request->diabetes;
        $antepat->renales = $request->renales;
        $antepat->quirurgicos = $request->quirurgicos;
        $antepat->alergicos = $request->alergicos;
        $antepat->transfuciones = $request->transfuciones;
        $antepat->medicamentos = $request->medicamentos;
        $antepat->save();

        $anteFam = AnteFamiliar::where('id',$historialclin->id_anteFam);
        $anteFam->padre = $request->padre;
        $anteFam->madre = $request->madre;
        $anteFam->save();

        $historialclin = new Historialclinico();
        $historialclin->descripcion = $request->descripcion;
        $historialclin->gruposanguineo = $request->gruposanguineo;
        $historialclin->ocupacion = $request->ocupacion;
        $historialclin->nombredoctor = $request->nombredoctor;
        $historialclin->ultimaconsulta = $request->ultimaconsulta;
        $historialclin->id_paciente = $request->id_paciente;
        $historialclin->id_ante_patologicos_ = $antepat->id;
        $historialclin->id_antenopatologico = $antenopat->id;
        $historialclin->id_antefamiliares = $anteFam->id;
        $historialclin->save();

        return redirect()->route('historias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $historialclin = Historialclinico::find($id);
        $antenopat = AnteNoPatologico::where('id',$historialclin->id_antenopat);
        $antepat = AnteNoPatologico::where('id',$historialclin->id_antepat);
        $anteFam = AnteFamiliar::where('id',$historialclin->id_anteFam);
        $historialclin->delete();
        $antenopat->delete();
        $antepat->delete();
        $anteFam->delete();

        return redirect()->route('historias.index');

    }

}
