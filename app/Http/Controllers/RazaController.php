<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Raza;
use App\Models\Especie;
use Illuminate\Support\Facades\Crypt;

class razaController extends Controller
{
    private $modulo = "razas";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $razas = raza::all();      

        return view('razas.lista_razas', ['titulo'=>'Gestionar razas',
                                                          'razas' => $razas,
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
        $titulo = 'NUEVA raza';
        $especies = Especie::all();

        return view('razas.form_nueva_raza', ['titulo'=>$titulo, 
                                                   'especies' => $especies,
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
        $raza = new raza();
        $raza->esp_id = $request->input('esp_id');
        $raza->raz_nombre = $request->input('raz_nombre');
        $raza->save();
        return redirect('razas');
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
        $titulo = 'EDITAR raza';
        $raza = raza::where('raz_id', $id)->first();
        $especies = Especie::all();

        return view('razas.form_editar_raza', ['titulo'=>$titulo, 
                                                   'raza' => $raza,
                                                   'especies' => $especies,
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
        $raza = raza::where('raz_id', $id)->first();
        $raza->esp_id = $request->input('esp_id');
        $raza->raz_nombre = $request->input('raz_nombre');
        $raza->save();
        return redirect('razas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $raza = raza::where('raz_id', $id)->first();
        $raza->delete();
        return redirect('razas');
    }
}
