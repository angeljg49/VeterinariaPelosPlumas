<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\Vacuna;
use App\Models\VacunaAplicada;
use Illuminate\Support\Facades\Crypt;

class vacunaController extends Controller
{
    private $modulo = "vacunas";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacunas = vacuna::all();      

        return view('vacunas.lista_vacunas', ['titulo'=>'Gestionar vacunas',
                                                          'vacunas' => $vacunas,
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
        $titulo = 'NUEVo vacuna';
        $vacunas = vacuna::all();

        return view('vacunas.form_nueva_vacuna', ['titulo'=>$titulo, 
                                                   'vacunas' => $vacunas,
                                                   'modulo_activo' => $this->modulo
                                                 ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vacuna = new vacuna();
        $vacuna->vac_nombre = $request->input('vac_nombre');
        $vacuna->vac_tipo = $request->input('vac_tipo');
        $vacuna->vac_periodo = $request->input('vac_periodo');
        $vacuna->vac_nombre = $request->input('vac_nombre');
        $vacuna->vac_descripcion = $request->input('vac_descripcion');
        $vacuna->save();
        return redirect('vacunas');
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
        $id = Crypt::decryptString($id);//Desencriptando parametro ID
        $titulo = 'EDITAR vacuna';
        $vacuna = vacuna::where('vac_id', $id)->first();

        return view('vacunas.form_editar_vacuna', ['titulo'=>$titulo, 
                                                   'vacuna' => $vacuna,
                                                   'modulo_activo' => $this->modulo
                                                 ]);
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
        $vacuna = vacuna::where('vac_id', $id)->first();
        $vacuna->vac_nombre = $request->input('vac_nombre');
        $vacuna->vac_tipo = $request->input('vac_tipo');
        $vacuna->vac_periodo = $request->input('vac_periodo');
        $vacuna->vac_nombre = $request->input('vac_nombre');
        $vacuna->vac_descripcion = $request->input('vac_descripcion');
        $vacuna->save();
        return redirect('vacunas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacuna = vacuna::where('vac_id', $id)->first();
        $vacuna->delete();
        return redirect('vacunas');
    }

    /*
    **********************************************************************************************************
    VACUNAS APLICADAS
    */
    public function vacunas_mascota($id)
    {
        $id = Crypt::decryptString($id);//Desencriptando parametro ID
        $vacunas = VacunaAplicada::where('mas_id', $id)->get();      
        $mascota = Mascota::where('mas_id', $id)->first();

        return view('vacunas.lista_vacunas_mascota', ['titulo'=>'Historial de Vacunas aplicadas',
                                                          'vacunas' => $vacunas,
                                                          'mas_id'=>$id,
                                                          'mascota'=>$mascota,
                                                          'modulo_activo' => $this->modulo
                                                         ]);
        }

    public function aplicar($id)
    {
        $id = Crypt::decryptString($id);//Desencriptando parametro ID
        $titulo = 'Aplicar vacuna';
        $vacunas = Vacuna::all();

        return view('vacunas.form_aplicar_vacuna', [ 'titulo'=>$titulo, 
                                                   'vacunas' => $vacunas,
                                                   'mas_id' => $id,
                                                   'modulo_activo' => $this->modulo
                                                 ]);
    }

    public function store_aplicar(Request $request)
    {
        $vacuna_aplicada = new VacunaAplicada();
        $mas_id = $request->input('mas_id');
        $vacuna_aplicada->vac_id = $request->input('vac_id');
        $vacuna_aplicada->mas_id = $request->input('mas_id');
        $vacuna_aplicada->vap_fecha = $request->input('vap_fecha');
        $vacuna_aplicada->vap_edad_aplicada = 0;
        $vacuna_aplicada->vap_observaciones = $request->input('vap_observaciones');
        $vacuna_aplicada->save();
        return redirect('mascotas/'.Crypt::encryptString($mas_id).'/vacunas');
    }

    public function delete_aplicada($id)
    {
        $vacuna_aplicada = VacunaAplicada::where('vap_id', $id)->first();
        $mas_id = $vacuna_aplicada->mascota->mas_id;
        $vacuna_aplicada->delete();
        return redirect('mascotas/'.Crypt::encryptString($mas_id).'/vacunas');
    }

}
