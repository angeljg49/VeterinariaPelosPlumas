<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especie;
use Illuminate\Support\Facades\Crypt;

class EspecieController extends Controller
{
    private $modulo = "especies";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especies = Especie::all();      

        return view('especies.lista_especies', ['titulo'=>'Gestionar especies',
                                                          'especies' => $especies,
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
        $titulo = 'NUEVA especie';
        $especies = Especie::all();

        return view('especies.form_nueva_especie', ['titulo'=>$titulo, 
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
        $especie = new Especie();
        $especie->esp_nombre = $request->input('esp_nombre');
        $especie->save();
        return redirect('especies');
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
        $titulo = 'EDITAR especie';
        $especie = Especie::where('esp_id', $id)->first();

        return view('especies.form_editar_especie', ['titulo'=>$titulo, 
                                                   'especie' => $especie,
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
        $especie = Especie::where('esp_id', $id)->first();
        $especie->esp_nombre = $request->input('esp_nombre');
        $especie->save();
        return redirect('especies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $especie = Especie::where('esp_id', $id)->first();
        $especie->delete();
        return redirect('especies');
    }
}
