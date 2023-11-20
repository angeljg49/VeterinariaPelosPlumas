<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\CitaDisponible;
use App\Models\Mascota;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
    private $modulo = "citas";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $citas = CitaDisponible::all();
        $citas = DB::table('cita_disponible')
        ->select('cdi_fecha', DB::raw('count(*) as total_fichas'))
        ->groupBy('cdi_fecha')
        ->get();      

        return view('citas.lista_citas', ['titulo'=>'Gestionar citas programadas',
                                          'citas' => $citas,
                                          'modulo_activo' => $this->modulo
                                         ]);
    }

    public function get_por_fecha($fecha)
    {
        $fecha = Crypt::decryptString($fecha);//Desencriptando parametro FECHA
        $citas = CitaDisponible::where('cdi_fecha', $fecha)->orderBy('cdi_nro', 'asc')->get();

        return view('citas.lista_citas_fecha', ['titulo'=>'Gestionar citas por fecha',
                                          'citas' => $citas,
                                          'modulo_activo' => $this->modulo
                                         ]);
    }


    public function lista_citas_mascota($mas_id)
    {
        $id = Crypt::decryptString($mas_id);//Desencriptando parametro ID
        $citas = Cita::where('mas_id', $id)->get();
        $mascota = Mascota::where('mas_id', $id)->get();

        return view('citas.lista_citas_mascota', ['titulo'=>'Gestionar citas de la mascota',
                                          'mascota' => $mascota,
                                          'citas' => $citas,
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
        $titulo = 'CREAR CITAS PROGRAMADAS';

        return view('citas.form_nueva_cita', ['titulo'=>$titulo, 
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
        $cant = $request->input('cdi_cant');
        $fecha = $request->input('cdi_fecha');
        $hora_ini = $request->input('cdi_hora');
        $fecha_hora = date($fecha." ".$hora_ini);
        for($i=0; $i<$cant; $i++){
            $cita = new CitaDisponible();
            $cita->cdi_nro = $i+1;
            $cita->cdi_fecha = $fecha;
            $cita->cdi_hora = substr($fecha_hora,11,5);
            $cita->cdi_estado = 0;
            $cita->save();            

            //calcular el nuevo tiempo
            $intervalo = "+".$request->input('cdi_intervalo')." minute";
            $fecha_hora = strtotime($intervalo, strtotime($fecha_hora));    
            $fecha_hora = date ( 'Y-m-d H:i:s' , $fecha_hora);    
        }
        return redirect('citas');
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
