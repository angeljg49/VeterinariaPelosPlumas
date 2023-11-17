<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\ExamenComplementario;
use App\Models\Mascota;
use App\Models\SignoVital;
use App\Models\Tratamiento;
use App\Models\Veterinario;
use Illuminate\Support\Facades\Crypt;

class ConsultaController extends Controller
{
    private $modulo = "propietarios";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = Consulta::all();      

        return view('consultas.lista_consultas', ['titulo'=>'Gestionar consultas',
                                                          'consultas' => $consultas,
                                                          'modulo_activo' => $this->modulo
                                                         ]);
    }


    public function consultas_mascota($id)
    {
        $id = Crypt::decryptString($id);//Desencriptando parametro ID
        $consultas = Consulta::where('mas_id', $id)->get();
        $mascota = Mascota::where('mas_id', $id)->first();
        
        return view('consultas.lista_consultas', ['titulo'=>'Gestionar consultas veterinarias',
                                                          'consultas' => $consultas,
                                                          'mas_id' => $id,
                                                          'mascota' => $mascota,
                                                          'modulo_activo' => $this->modulo
                                                         ]);
    }

    public function registrar($id)
    {
        $id = Crypt::decryptString($id);//Desencriptando parametro ID
        $mascota = Mascota::where('mas_id', $id)->first();
        $veterinarios = Veterinario::all();
        
        return view('consultas.form_nueva_consulta', ['titulo'=>'Registrar nueva consulta',
                                                          'veterinarios' => $veterinarios,
                                                          'mascota' => $mascota,
                                                          'modulo_activo' => $this->modulo
                                                         ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function store_consulta(Request $request)
    {
        $consulta = new Consulta();
        $consulta->vet_id = 1;
        $consulta->mas_id = $request->input('mas_id');
        $consulta->cdi_id = null;
        $consulta->con_motivo = $request->input('con_motivo');
        $consulta->con_antecedentes = $request->input('con_antecedentes');
        $consulta->con_signos_clinicos = $request->input('con_signos_clinicos');
        $consulta->con_diagnostico_presuntivo = $request->input('con_diagnostico_presuntivo');
        $consulta->con_quirurgico = $request->input('con_quirurgico');
        $consulta->con_higienico = $request->input('con_higienico');
        $consulta->con_proxima_revision = $request->input('con_proxima_revision');
        $consulta->con_fecha = date('Y-m-d');
        $consulta->save();

        $signo = new SignoVital();
        $signo->con_id = $consulta->con_id;
        $signo->svi_temperatura = $request->input('svi_temperatura');
        $signo->svi_peso = $request->input('svi_peso');
        $signo->svi_fc = $request->input('svi_fc');
        $signo->svi_fr = $request->input('svi_fr');
        $signo->svi_mm = $request->input('svi_mm');
        $signo->save();

        //tratamiento clinico
        $tratamiento = new Tratamiento();
        $tratamiento->con_id = $consulta->con_id;
        $tratamiento->tra_tipo = 0;
        $tratamiento->tra_farmaco = $request->input('trac_farmaco');
        $tratamiento->tra_mg = $request->input('trac_mg');
        $tratamiento->tra_ml = $request->input('trac_ml');
        $tratamiento->tra_via = $request->input('trac_via');
        $tratamiento->tra_observaciones_indicaciones = $request->input('trac_observaciones_indicaciones');
        $tratamiento->save();

        //tratamiento ambulatorio
        $tratamiento = new Tratamiento();
        $tratamiento->con_id = $consulta->con_id;
        $tratamiento->tra_tipo = 1;
        $tratamiento->tra_farmaco = $request->input('traa_farmaco');
        $tratamiento->tra_mg = $request->input('traa_mg');
        $tratamiento->tra_ml = $request->input('traa_ml');
        $tratamiento->tra_via = $request->input('traa_via');
        $tratamiento->tra_observaciones_indicaciones = $request->input('traa_observaciones_indicaciones');
        $tratamiento->save();

        //examenes complementarios
        $examen = new ExamenComplementario();
        $examen->con_id = $consulta->con_id;
        $examen->eco_descripcion = $request->input('eco_descripcion');
        $examen->save();
        
        return redirect('mascotas/'.Crypt::encryptString($request->input('mas_id'))."/consultas");
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

    public function show_consulta($id)
    {
        $id = Crypt::decryptString($id);//Desencriptando parametro ID
        $titulo = 'Registro de consulta';
        $consulta = Consulta::where('con_id', $id)->first();

        return view('consultas.show_consulta', ['titulo'=>$titulo, 
                                                   'consulta' => $consulta,
                                                   'modulo_activo' => $this->modulo
                                                 ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
 
    public function delete_consulta($id)
    {
        $consulta = Consulta::where('con_id', $id)->first();
        $mas_id = $consulta->mas_id;
        $consulta->delete();
        return redirect('mascotas/'.Crypt::encryptString($mas_id).'/consultas');
    }
    
}
