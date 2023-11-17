<?php

namespace App\Http\Controllers;

use App\Models\AutorizacionCirugia;
use App\Models\Cita;
use Illuminate\Http\Request;
use App\Models\Componente;
use App\Models\Consulta;
use App\Models\Destino;
use App\Models\Foja;
use App\Models\Funcionario;
use App\Models\Grupo;
use App\Models\Inspeccion;
use App\Models\Mascota;
use App\Models\OrdenTrabajo;
use App\Models\Personal;
use App\Models\Propietario;
use App\Models\Salida;
use App\Models\StockComponente;
use App\Models\Subalmacen;
use App\Models\TarjetaPlanificada;
use App\Models\Usuario;
use App\Models\Vacuna;
use App\Models\VacunaAplicada;
use App\Models\Veterinario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private $modulo = "dashboard";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuarios = Auth::user();
        $titulo = "Panel de inicio";
        $citas = Cita::all();
        $propietarios = Propietario::all();
        $mascotas = Mascota::all();
        $vacunas_aplicadas = VacunaAplicada::all();
        $consultas = Consulta::all();
        $vacunas = Vacuna::all();
        $veterinarios = Veterinario::all();
        $cirugias = AutorizacionCirugia::all();
        $consultas_por_dia = DB::table('consulta')
        ->select("con_fecha as fecha", DB::raw('count(*) as total_consultas'))
        ->groupBy('con_fecha')
        ->orderBy('con_fecha','ASC')
        ->get();      

        return view('dashboard.detalle_tablero', [
                                                    'usuarios'=>$usuarios, 
                                                    'titulo'=>$titulo, 
                                                    'citas'=>$citas, 
                                                    'cpd'=>$consultas_por_dia, 
                                                    'propietarios'=>$propietarios, 
                                                    'mascotas'=>$mascotas, 
                                                    'vacunas_aplicadas'=>$vacunas_aplicadas, 
                                                    'consultas'=>$consultas, 
                                                    'vacunas'=>$vacunas, 
                                                    'cirugias'=>$cirugias, 
                                                    'veterinarios'=>$veterinarios, 
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
