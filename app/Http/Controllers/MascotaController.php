<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mascota;
use App\Models\raza;
use App\Models\especie;
use App\Models\propietario;
use Illuminate\Support\Facades\Crypt;

class mascotaController extends Controller
{
    private $modulo = "propietarios";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $mascotas = mascota::all();      

        // return view('mascotas.lista_mascotas', ['titulo'=>'Gestionar mascotas',
        //                                                   'mascotas' => $mascotas,
        //                                                   'modulo_activo' => $this->modulo
        //                                                  ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    public function nuevo_mascota($id)
    {
        $titulo = 'NUEVA mascota';
        $propietario = propietario::where('pro_id', $id)->first();
        $razas = Raza::all();
        $especies = Especie::all();

        return view('mascotas.form_nueva_mascota', ['titulo'=>$titulo, 
                                                   'propietario' => $propietario,
                                                   'razas' => $razas,
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
        $mascota = new mascota();
        $mascota->pro_id = $request->input('pro_id');
        $mascota->mas_nombre = $request->input('mas_nombre');
        $mascota->mas_edad = $request->input('mas_edad');
        $mascota->mas_sexo = $request->input('mas_sexo');
        $mascota->mas_color = $request->input('mas_color');
        $mascota->raz_id = $request->input('raz_id');
        $mascota->mas_fnac_estimado = (date("Y") - $request->input('mas_edad'))."-01-01";
        $mascota->save();
        return redirect('propietarios/'.Crypt::encryptString($request->input('pro_id')).'/mascotas');
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
        $titulo = 'EDITAR mascota';
        $mascota = mascota::where('mas_id', $id)->first();
        $propietarios = propietario::all();

        return view('mascotas.form_editar_mascota', ['titulo'=>$titulo, 
                                                   'mascota' => $mascota,
                                                   'propietarios' => $propietarios,
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
        $mascota = mascota::where('mas_id', $id)->first();
        $mascota->pro_id = $request->input('pro_id');
        $mascota->mas_nombre = $request->input('mas_nombre');
        $mascota->save();
        return redirect('mascotas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mascota = mascota::where('mas_id', $id)->first();
        $mascota->delete();
        return redirect('mascotas');
    }
}
