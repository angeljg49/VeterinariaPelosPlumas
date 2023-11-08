<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinario;
use Illuminate\Support\Facades\Crypt;

class veterinarioController extends Controller
{
    private $modulo = "veterinarios";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $veterinarios = veterinario::all();      

        return view('veterinarios.lista_veterinarios', ['titulo'=>'Gestionar veterinarios',
                                                          'veterinarios' => $veterinarios,
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
        $titulo = 'NUEVo veterinario';
        $veterinarios = veterinario::all();

        return view('veterinarios.form_nueva_veterinario', ['titulo'=>$titulo, 
                                                   'veterinarios' => $veterinarios,
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
        $veterinario = new veterinario();
        $veterinario->vet_nombre_completo = $request->input('vet_nombre');
        $veterinario->save();
        return redirect('veterinarios');
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
        $titulo = 'EDITAR veterinario';
        $veterinario = veterinario::where('vet_id', $id)->first();

        return view('veterinarios.form_editar_veterinario', ['titulo'=>$titulo, 
                                                   'veterinario' => $veterinario,
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
        $veterinario = veterinario::where('vet_id', $id)->first();
        $veterinario->vet_nombre_completo = $request->input('vet_nombre_completo');
        $veterinario->save();
        return redirect('veterinarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $veterinario = veterinario::where('vet_id', $id)->first();
        $veterinario->delete();
        return redirect('veterinarios');
    }
}
