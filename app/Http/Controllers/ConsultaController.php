<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\Mascota;
use Illuminate\Support\Facades\Crypt;

class ConsultaController extends Controller
{
    private $modulo = "consultas";

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
}
