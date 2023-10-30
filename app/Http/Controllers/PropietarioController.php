<?php

namespace App\Http\Controllers;

use App\Models\AutorizacionCirugia;
use App\Models\Mascota;
use Illuminate\Http\Request;
use App\Models\propietario;
use App\Models\usuario;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class propietarioController extends Controller
{
    private $modulo = "propietarios";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propietarios = propietario::all();      

        return view('propietarios.lista_propietarios', ['titulo'=>'Gestionar propietarios',
                                                          'propietarios' => $propietarios,
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
        $titulo = 'NUEVo propietario';
        $propietarios = propietario::all();

        return view('propietarios.form_nueva_propietario', ['titulo'=>$titulo, 
                                                   'propietarios' => $propietarios,
                                                   'modulo_activo' => $this->modulo
                                                 ]);
    }


    public function listar_mascotas($id)
    {
        $titulo = 'Gestionar mascotas';
        $id = Crypt::decryptString($id);//Desencriptando parametro ID
        $propietario = Propietario::where('pro_id', $id)->first();

        $mascotas = $propietario->mascotas;

        return view('mascotas.lista_mascotas', ['titulo'=>'Gestionar mascotas',
                                                          'propietario' => $propietario,
                                                          'mascotas' => $mascotas,
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

        $usuario = new Usuario();
        $usuario->usu_nombre = $request->input('usu_nombre');
        $usuario->password = Hash::make($request->input('usu_password'));
        $usuario->usu_email = $request->input('usu_email');
        $usuario->usu_rol = 2;
        $usuario->save();


        $propietario = new propietario();
        $propietario->usu_id = $usuario->usu_id;
        $propietario->pro_nombre_completo = $request->input('pro_nombre_completo');
        $propietario->pro_ci = $request->input('pro_ci');
        $propietario->pro_direccion = $request->input('pro_direccion');
        $propietario->pro_zona = $request->input('pro_zona');
        $propietario->save();

        return redirect('propietarios');
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
        $titulo = 'EDITAR propietario';
        $propietario = propietario::where('pro_id', $id)->first();

        return view('propietarios.form_editar_propietario', ['titulo'=>$titulo, 
                                                   'propietario' => $propietario,
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

        $propietario = propietario::where('pro_id', $id)->first();

        $usuario = usuario::where('usu_id', $propietario->usuario->usu_id)->first();
        $usuario->usu_nombre = $request->input('usu_nombre');
        // $usuario->password = Hash::make($request->input('usu_password'));
        $usuario->usu_email = $request->input('usu_email');
        // $usuario->usu_rol = 2;
        $usuario->save();

        
        // $propietario->usu_id = $usuario->usu_id;
        $propietario->pro_nombre_completo = $request->input('pro_nombre_completo');
        $propietario->pro_ci = $request->input('pro_ci');
        $propietario->pro_direccion = $request->input('pro_direccion');
        $propietario->pro_zona = $request->input('pro_zona');
        $propietario->save();
        return redirect('propietarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $propietario = propietario::where('pro_id', $id)->first();
        $propietario->delete();
        return redirect('propietarios');
    }

    /*
    ******************************************************************************************************************************
    AUTORIZACIONES DE CIRUGIA
     */
    public function autorizaciones_mascota($id)
    {
        $id = Crypt::decryptString($id);//Desencriptando parametro ID
        $autorizaciones = AutorizacionCirugia::where('mas_id', $id)->get();      
        $mascota = Mascota::where('mas_id', $id)->first();

        return view('autorizaciones.lista_autorizaciones_mascota', ['titulo'=>'Historial de Autorizaciones de Cirugia',
                                                          'autorizaciones' => $autorizaciones,
                                                          'mas_id'=>$id,
                                                          'mascota'=>$mascota,
                                                          'modulo_activo' => $this->modulo
                                                         ]);
    }

    public function autorizar($id)
    {
        $id = Crypt::decryptString($id);//Desencriptando parametro ID
        $titulo = 'Nueva autorizacion de cirugia';
        $mascota = Mascota::where('mas_id', $id)->first();
        $pro_id = $mascota->propietario->pro_id;

        return view('autorizaciones.form_autorizacion_mascota', [ 'titulo'=>$titulo, 
                                                   'mas_id' => $id,
                                                   'pro_id' => $pro_id,
                                                   'modulo_activo' => $this->modulo
                                                 ]);
    }

    public function store_autorizacion(Request $request)
    {
        $autorizacion = new AutorizacionCirugia();
        $mas_id = $request->input('mas_id');
        $autorizacion->pro_id = $request->input('pro_id');
        $autorizacion->mas_id = $request->input('mas_id');
        $autorizacion->aci_estado_vacunas = $request->input('aci_estado_vacunas');
        $autorizacion->aci_alimentacion = $request->input('aci_alimentacion');
        $autorizacion->aci_desparacitacion = $request->input('aci_desparacitacion');
        $autorizacion->aci_fecha = $request->input('aci_fecha');
        $autorizacion->aci_hora_ingreso = $request->input('aci_hora_ingreso');
        $autorizacion->save();
        return redirect('mascotas/'.Crypt::encryptString($mas_id).'/cirugias');
    }

    public function delete_autorizacion($id)
    {
        $autorizacion = AutorizacionCirugia::where('aci_id', $id)->first();
        $mas_id = $autorizacion->mascota->mas_id;
        $autorizacion->delete();
        return redirect('mascotas/'.Crypt::encryptString($mas_id).'/cirugias');
    }

}
