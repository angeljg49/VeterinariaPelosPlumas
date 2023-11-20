<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    private $modulo = "reportes";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas_por_dia = DB::table('consulta')
        ->select("con_fecha as fecha", DB::raw('count(*) as total_consultas'))
        ->groupBy('con_fecha')
        ->orderBy('con_fecha','ASC')
        ->get();      

        $consultas_por_mes = DB::table('consulta')
        ->select(DB::raw("DATE_TRUNC('month',con_fecha) AS  fecha"), DB::raw("count(*) as total_consultas"))
        ->groupBy(DB::raw("DATE_TRUNC('month',con_fecha)"))
        ->get();

        $vacunas_por_dia = DB::table('vacuna_aplicada')
        ->select("vap_fecha as fecha", DB::raw('count(*) as total_vacunas'))
        ->groupBy('vap_fecha')
        ->orderBy('vap_fecha','ASC')
        ->get();

        $vacunas_por_mes = DB::table('vacuna_aplicada')
        ->select(DB::raw("DATE_TRUNC('month',vap_fecha) AS  fecha"), DB::raw("count(*) as total_vacunas"))
        ->groupBy(DB::raw("DATE_TRUNC('month',vap_fecha)"))
        ->get();


        $cirugias_por_dia = DB::table('autorizacion_cirugia')
        ->select("aci_fecha as fecha", DB::raw('count(*) as total_cirugias'))
        ->groupBy('aci_fecha')
        ->orderBy('aci_fecha','ASC')
        ->get();

        $cirugias_por_mes = DB::table('autorizacion_cirugia')
        ->select(DB::raw("DATE_TRUNC('month',aci_fecha) AS  fecha"), DB::raw("count(*) as total_cirugias"))
        ->groupBy(DB::raw("DATE_TRUNC('month',aci_fecha)"))
        ->get();

        return view('reportes.lista_reportes', ['titulo'=>'Gestión de reportes',
                                                          'consultas_por_dia' => $consultas_por_dia,
                                                          'consultas_por_mes' => $consultas_por_mes,
                                                          'vacunas_por_dia' => $vacunas_por_dia,
                                                          'vacunas_por_mes' => $vacunas_por_mes,
                                                          'cirugias_por_dia' => $cirugias_por_dia,
                                                          'cirugias_por_mes' => $cirugias_por_mes,
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
