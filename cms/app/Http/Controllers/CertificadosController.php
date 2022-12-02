<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Html;
use Illuminate\Support\Facades\Storage;
use DNS1D;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\LogDocuments;
use Illuminate\Database\QueryException;
use Redirect;
use ArrayObject;
use App\Models\laboral;
use App\Models\cargo;
use App\Models\pago;
use App\Models\tiempo;
use App\Models\User;


class CertificadosController extends Controller
{
    public function __construct()

    {

       $this->middleware('auth');

    }

    public function certificados()
    {
        $cedula = auth()->user()->cedula;
        $anonomninas = DB::connection('oracle')->table('facweb_haberes_devengado as dev')
        ->select('dev.ano_nomina')          
                ->where('dev.cc', '=', $cedula)
                ->distinct()
                ->orderByDesc('dev.ano_nomina') 
                ->get();

        $tiposnomina = DB::connection('oracle')->table('facweb_haberes_devengado as dev')
        ->select('dev.tipo_nomina')          
                ->where('dev.cc', '=', $cedula)
                ->distinct()
                ->orderBy('dev.tipo_nomina', 'ASC') 
                ->get();             
        return view('certificados',["anonomninas"=>$anonomninas,"tiposnomina"=>$tiposnomina]);

        
    }
    
    public function download(Request $request) 
    {     
     
        setlocale(LC_ALL, 'es_ES');
        $identificacion = User::where('Email', '=', auth()->user()->email)->first();

        if(!$identificacion){
            return Redirect::back()->withErrors(['No se encontraron datos para los parámetros especificados.']);
        }

        $cedula = auth()->user()->cedula;
        
           $tipoCert = $request->input('tipoCert');
        
        switch($tipoCert){
            case 'UL';
                //Fecha actual            
                $date = Carbon::now();
                $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                $mes = $date->format('m');
                $fechaLetras = $date->format('d'). ' días del mes de '.$meses[$mes - 1]. ' de '. $date->format('Y');

                //Log documentos 
                $idDocumento =  Str::random(32);
                $log = new LogDocuments;
                $log->token = $idDocumento;
                $log->cedula = $cedula;
                $log->descripcion = 'unidad laboral';
                $log->created_at = $date;
                $log->save();

                //Obtener data
                $cargoData = $this->getData($tipoCert, '','', $cedula);
                if(!$cargoData){
                    return Redirect::back()->withErrors(['No se encontraron datos para los parámetros especificados.']);
                }
                
                
                //Cargar firma
                $url = laboral::where('tipo', '=', 'firma')->first();                
                if($url){
                    $path = public_path() . '/storage/laboral/'. $url->url;
                }else{ 
                    $path = storage_path('app\img\img_firma.jpg');
                }

                //Datos de firmante 
                $cedulaFirma = laboral::first();
                $datosFirmante = DB::connection('oracle')->table('facweb_certifica_tiempo_v1')                              
                ->where('cedula', '=', $cedulaFirma->cedula)               
                ->first();               

                $data = file_get_contents($path);
                $base64Firma = 'data:image/' . 'jpg' . ';base64,' . base64_encode($data);

                //Cargar logo
                $url = laboral::where('tipo', '=', 'logo')->first();
                if($url){
                    $path = public_path() . '/storage/laboral/'. $url->url;
                }else{
                    $path = storage_path('app\img\Escudo_Fac.jpg');
                }

                $pathLogoPie = storage_path('app\img\log_pie.jpeg');
                $pathLogoPie = file_get_contents($pathLogoPie);
                $base64LogoPie = 'data:image/' . 'jpg' . ';base64,' . base64_encode($pathLogoPie);
                
                $data = file_get_contents($path);
                $base64Logo = 'data:image/' . 'jpg' . ';base64,' . base64_encode($data);

                \Storage::disk('public')->put('test.png',base64_decode(\DNS2D::getBarcodePNG("4", "PDF417")));

                $datosGenerales = [
                    'firma'      => $base64Firma,
                    'logo'   => $base64Logo,                    
                    'fechaActual' => $date,
                    'fechaLetras' => $fechaLetras,
                    'base64LogoPie' => $base64LogoPie                   
                ];

                $dataTiempos = $cargoData['dataTiempos'];
                if ($dataTiempos == "R") {
                    return Redirect::back()->withErrors(['Personal retirado no puede descargar este tipo de certificados.']);
               
                }
                $cargoData = $cargoData['data'];
               
                $view =  \View::make('pdf.unidad_laboral', compact('datosGenerales','cargoData','idDocumento','dataTiempos', 'datosFirmante'))->render();

                break;
            
            case 'CT';
                //Fecha actual            
                $date = Carbon::now();
                $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                $mes = $date->format('m');
                $fechaLetras = $date->format('d'). ' días del mes de '.$meses[$mes - 1]. ' de '. $date->format('Y');

                //Log documentos 
                $idDocumento =  Str::random(32);
                $log = new LogDocuments;
                $log->token = $idDocumento;
                $log->cedula = $cedula;
                $log->descripcion = 'tiempos';
                $log->created_at = $date;
                $log->save();

                $dateCorte = date_format($date, 'd-m-Y');

                //Obtener data

                $dataTiempos = $this->getData($tipoCert, '', '', $cedula);
                if(!$dataTiempos){
                    return Redirect::back()->withErrors(['No se encontraron datos para los parámetros especificados.']);
                }
               
               
               //Cargar firma
               $url = tiempo::where('tipo', '=', 'firma')->first();                
               if($url){
                   $path = public_path() . '/storage/tiempo/'. $url->url;
               }else{
                   $path = storage_path('app\img\img_firma.jpg');
               }

               //Datos de firmante 
               $cedulaFirma = tiempo::first();
               $datosFirmante = DB::connection('oracle')->table('facweb_certifica_tiempo_v1')                              
               ->where('cedula', '=', $cedulaFirma->cedula)               
               ->first();
               
               $data = file_get_contents($path);
               $base64Pie = 'data:image/' . 'jpg' . ';base64,' . base64_encode($data);

               //Cargar logo
               $url = tiempo::where('tipo', '=', 'logo')->first();
               if($url){
                   $path = public_path() . '/storage/tiempo/'. $url->url;
               }else{
                   $path = storage_path('app\img\Escudo_Fac.jpg');
               }
                $data = file_get_contents($path);
                $base64Logo = 'data:image/' . 'jpg' . ';base64,' . base64_encode($data);

                $pathLogoPie = storage_path('app\img\log_pie.jpeg');
                $pathLogoPie = file_get_contents($pathLogoPie);
                $base64LogoPie = 'data:image/' . 'jpg' . ';base64,' . base64_encode($pathLogoPie);
                

                
                \Storage::disk('public')->put('test.png',base64_decode(\DNS2D::getBarcodePNG("4", "PDF417")));

                $datosGenerales = [
                    'logo'   => $base64Logo,                    
                    'fechaActual' => $date,
                    'fechaCorte' => $dateCorte,
                    'fotoPie' => $base64Pie,
                    'fechaLetras' => $fechaLetras,
                    'base64LogoPie' => $base64LogoPie
                ];

                $view =  \View::make('pdf.tiempos', compact('datosGenerales', 'dataTiempos','idDocumento','datosFirmante'))->render();            
                
            break;

            case 'CC';
                //Fecha actual            
                $date = Carbon::now();
                $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                $mes = $date->format('m');
                $fechaLetras = $date->format('d'). ' días del mes de '.$meses[$mes - 1]. ' de '. $date->format('Y');
              
                

                //Obtener data

                $dataCC = $this->getData($tipoCert,'','',$cedula);                
                if(!$dataCC){
                    return Redirect::back()->withErrors(['No se encontraron datos para los parámetros especificados.']);
                }

                $mesNumeroIni = $this->mesNumero(substr($dataCC['dataTiempos']->fecha_inicio,3,-5));
                $fecha_inicio = substr($dataCC['dataTiempos']->fecha_inicio,-4).'-'.$mesNumeroIni.'-'.substr($dataCC['dataTiempos']->fecha_inicio,0,2);

                 //Log documentos 
                $idDocumento =  Str::random(32);
                $log = new LogDocuments;
                $log->token = $idDocumento;
                $log->cedula = $cedula;
                $log->descripcion = 'cargos';
                $log->created_at = $date;
                $log->save();
                
               
                //Cargar firma
               $url = cargo::where('tipo', '=', 'firma')->first();                
               if($url){
                   $path = public_path() . '/storage/cargo/'. $url->url;
               }else{
                   $path = storage_path('app\img\img_firma.jpg');
               }

               //Datos de firmante 
               $cedulaFirma = cargo::first();
               $datosFirmante = DB::connection('oracle')->table('facweb_certifica_tiempo_v1')                              
               ->where('cedula', '=', $cedulaFirma->cedula)               
               ->first();
               
               $data = file_get_contents($path);
               $base64Firma = 'data:image/' . 'jpg' . ';base64,' . base64_encode($data);

               //Cargar logo
               $url = cargo::where('tipo', '=', 'logo')->first();
               if($url){
                   $path = public_path() . '/storage/cargo/'. $url->url;
               }else{
                   $path = storage_path('app\img\Escudo_Fac.jpg');
               }
                $data = file_get_contents($path);
                $base64Logo = 'data:image/' . 'jpg' . ';base64,' . base64_encode($data);

                $dataCC =  $dataCC['data'];
               // \Storage::disk('public')->put('test.png',base64_decode(\DNS2D::getBarcodePNG("4", "PDF417")));

               $pathLogoPie = storage_path('app\img\log_pie.jpeg');
               $pathLogoPie = file_get_contents($pathLogoPie);
               $base64LogoPie = 'data:image/' . 'jpg' . ';base64,' . base64_encode($pathLogoPie);
               
                $datosGenerales = [                   
                    'logo'   => $base64Logo,                    
                    'fechaActual' => $date,
                    'fotoPie' => $base64Firma,
                    'fechaLetras' => $fechaLetras,
                    'base64LogoPie' => $base64LogoPie
                ];

               
                $view =  \View::make('pdf.cargos', compact('datosGenerales','idDocumento','dataCC', 'fecha_inicio','datosFirmante'))->render();            
                
            break;

            case 'CP';

            $ano = $request->input('ano');
            $mes = $request->input('meses');
            $tnomina = $request->input('tnomina');
            
            if ($tnomina == 4) {
                $rules = [                   
                    'ano' => 'required',
                    'tnomina' =>'required'
                ];
            }else{
                $rules = [
                    'meses' => 'required',
                    'ano' => 'required',
                    'tnomina' =>'required'
                ];
            }

            switch ($tnomina) {
                case 1:
                    session(['tnomina' => 'la nómina mensual']);
                    break;
                case 2:
                    session(['tnomina' =>  'la prima de servicio']);
                    break;
                case 3:
                    session(['tnomina' => 'la prima de navidad']);
                    break;
                case 4:
                    session(['tnomina' => 'el retroactivo']);
                    break;
                case 5:
                    session(['tnomina' => 'el adicional']);
                    break;
                case 6:
                    session(['tnomina' => 'el adicional vigencia actual']);
                    break;
                case 7:
                    session(['tnomina' => 'el adicional vigencia expirada']);
                    break;
                
            }

            

           
            
            $this->validate($request, $rules);
           
                //Fecha actual            
                $date = Carbon::now();
                $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                // if ($tnomina != 4) {
                //     $mes = $date->format('m');
                // }        
                $fechaLetras = $date->format('d'). ' días del mes de '.$meses[$mes - 1]. ' de '. $date->format('Y');
              
               
                $mesLetra = $meses[$mes - 1];

                //Obtener data

                $dataPagos = $this->getData($tipoCert, $ano,$mes,$cedula, $tnomina);                               
                if( count($dataPagos['devengado']) == 0){
                    return Redirect::back()->withErrors(['No se encontraron datos para los parámetros especificados.']);
                }
                
                //Log documentos 
                $idDocumento =  Str::random(32);
                $log = new LogDocuments;
                $log->token = $idDocumento;
                $log->cedula = $cedula;
                $log->descripcion = 'desprendible de pagos';
                $log->created_at = $date;
                $log->save();
                
                //Cargar firma
               $url = pago::where('tipo', '=', 'firma')->first();                
               if($url){
                   $path = public_path() . '/storage/pago/'. $url->url;
               }else{
                   $path = storage_path('app\img\img_firma.jpg');
               }
               //Datos de firmante 
               $cedulaFirma = pago::first();
               $datosFirmante = DB::connection('oracle')->table('facweb_certifica_tiempo_v1')                              
               ->where('cedula', '=', $cedulaFirma->cedula)               
               ->first();
               
               $data = file_get_contents($path);
               $base64Firma = 'data:image/' . 'jpg' . ';base64,' . base64_encode($data);

               //Cargar logo
               $url = pago::where('tipo', '=', 'logo')->first();
               if($url){
                   $path = public_path() . '/storage/pago/'. $url->url;
               }else{
                   $path = storage_path('app\img\Escudo_Fac.jpg');
               }
                $data = file_get_contents($path);
                $base64Logo = 'data:image/' . 'jpg' . ';base64,' . base64_encode($data);

                \Storage::disk('public')->put('test.png',base64_decode(\DNS2D::getBarcodePNG("4", "PDF417")));

                $pathLogoPie = storage_path('app\img\log_pie.jpeg');
               $pathLogoPie = file_get_contents($pathLogoPie);
               $base64LogoPie = 'data:image/' . 'jpg' . ';base64,' . base64_encode($pathLogoPie);
               
                $datosGenerales = [                   
                    'logo'   => $base64Logo,
                    'fechaActual' => $date,
                    'fotoPie' => $base64Firma,
                    'base64LogoPie' => $base64LogoPie
                ];


                $view =  \View::make('pdf.pago', compact('datosGenerales','idDocumento','dataPagos','fechaLetras','mesLetra','ano','datosFirmante'))->render();            
                
            break;
            
        }              
        
        $pdf = \App::make('dompdf.wrapper');       
        $pdf->loadHTML($view)->setPaper('letter');
        return $pdf->download('archivo.pdf');
    }
    public function getData($tipoCert, $ano = '', $mes = '',$cedula = '', $tnomina = '') 
    {
        switch($tipoCert){
            case 'UL';
               $data1 =DB::connection('oracle')->table('facweb_certifica_laboral_v1')               
                ->where('cedula', '=', $cedula)               
                ->first();

                $activo =DB::connection('oracle')->table('FACWEB_EMPLEADOS_V')
               ->select('activo')               
               ->where('cedula', '=', $cedula)               
               ->first();

               if ( $activo->activo == "NO") {

                    $dataTiempos = "R";
               }else{
                    $dataTiempos =DB::connection('oracle')->table('facweb_certifica_tiempo_v1')               
                    ->where('cedula', '=', $cedula)               
                    ->first();
               }

               $data = array(
                   'data' => $data1,
                   'dataTiempos'  => $dataTiempos
               );

            break;
            case 'CT';
               $activo =DB::connection('oracle')->table('FACWEB_EMPLEADOS_V')
               ->select('activo')               
               ->where('cedula', '=', $cedula)               
               ->first();

               $strActivo = '';

               if ( $activo->activo == "NO") {
                    $strActivo = 'retirado';
                    $dataTiempos =DB::connection('oracle')->table('facweb_certifica_tiempo_vr')               
                    ->where('cedula', '=', $cedula)               
                    ->get();
               }else{
                    $strActivo = 'orgánico'; 
                    $dataTiempos =DB::connection('oracle')->table('facweb_certifica_tiempo_v1')               
                    ->where('cedula', '=', $cedula)               
                    ->get();
               }

            if ($dataTiempos) {                
                $data = new ArrayObject();
                $tAnos = 0;
                $tMeses = 0;
                $tDias = 0;
               
                foreach ($dataTiempos as $value) {

                    $fecha_inicio = $value->fecha_inicio;
                    if($value->fecha_termino){
                        $fecha_termino = $value->fecha_termino;
                    }else{
                        $date = Carbon::now();
                        $fecha_termino = $date->format('d-M-Y');
                    }
                  
                    $mesNumeroIni = $this->mesNumero(substr($value->fecha_inicio,3,-5));
                    $mesNumeroFin = $this->mesNumero(substr($fecha_termino,3,-5));
                    $fechaIni = Carbon::parse(substr($fecha_inicio,-4).'-'.$mesNumeroIni.'-'.substr($value->fecha_inicio,0,2));
                    $fechaFin = Carbon::parse(substr($fecha_termino,-4).'-'.$mesNumeroFin.'-'.substr($fecha_termino,0,2));
                    
                    $intervalo = date_diff($fechaIni,$fechaFin);                    
                    $subTotal = str_pad($intervalo->y, 2, "0", STR_PAD_LEFT). ' '. str_pad($intervalo->m, 2, "0", STR_PAD_LEFT). ' '. str_pad($intervalo->d, 2, "0", STR_PAD_LEFT);
                    $tAnos =  $tAnos +  $intervalo->y;
                    $tMeses = $tMeses + $intervalo->m;
                    $tDias = $tDias +  $intervalo->d;
                   
                    if($tDias >= 30){                        
                        $tDias =  ($tDias - 30);
                        $tMeses++;                        
                    }

                    if($tMeses >= 12){
                        $tMeses = ($tMeses - 12);
                        $tAnos++;                        
                    }

                    $data->append(
                        array('tipo_tiempo' => $value->tipo_tiempo, 
                            'tipo_disposicion' => $value->tipo_disposicion,
                            'numero_disposicion' => $value->numero_disposicion,
                            'fecha_disposicion' => $value->fecha_disposicion,
                            'fecha_inicio' => substr($fechaIni,0,10),
                            'fecha_termino' => substr($fechaFin,0,10),
                            'subtotal' => $subTotal,
                            'nombres_apellidos' => $value->nombre_apellidos,
                            'cedula' => $value->cedula,
                            'codigo_militar' => $value->codigo_militar,
                            'unidad_laboral' => $value->unidad_laboral,
                            'total' => str_pad($tAnos,2, "0", STR_PAD_LEFT).' '. str_pad($tMeses,2, "0", STR_PAD_LEFT).' '.str_pad($tDias,2, "0", STR_PAD_LEFT),
                            'categoria' => $value->categoria,
                            'grado' => $value->grado,
                            'strActivo' => $strActivo
                        ));
               }

               
            }


            break;
            case 'CC';

                $activo =DB::connection('oracle')->table('FACWEB_EMPLEADOS_V')
                ->select('activo')               
                ->where('cedula', '=', $cedula)               
                ->first();

                if ( $activo->activo == "NO") {

                    $dataTiempos =DB::connection('oracle')->table('facweb_certifica_tiempo_vr')               
                    ->where('cedula', '=', $cedula)               
                    ->first();
                }else{
                    $dataTiempos =DB::connection('oracle')->table('facweb_certifica_tiempo_v1')               
                    ->where('cedula', '=', $cedula)               
                    ->first();
                }

                $dataReal = DB::connection('oracle')->select('SELECT * FROM fac_certifica_cargos_v where "Identificacion" ='. $cedula .' ORDER BY "Fecha_Inicio" ASC');

                $data = array(
                    'data'  => $dataReal,
                    'dataTiempos'  => $dataTiempos
                );

              
                               
            break;
            case 'CP';
            
               $descuentos = DB::connection('oracle')->table('facweb_haberes_descuento')               
                ->where('identificacion', '=', $cedula)
                ->where('tipo_nomina', '=', $tnomina)
                ->where('ano_nomina', '=', $ano)
                ->where('mes_nomina', '=', $mes)                 
                ->get();

                
                
                $devengado = DB::connection('oracle')->table('facweb_haberes_devengado as dev')
                ->select('dev.abreviatura','dev.porcentaje','dev.valor_dev',
                'dev.nombres_apellidos','dev.cc','dev.codigo_militar')             
                ->where('dev.cc', '=', $cedula)
                ->where('dev.ano_nomina', '=', $ano)
                ->where('dev.mes_nomina', '=', $mes) 
                ->where('dev.tipo_nomina', '=', $tnomina)
                ->orderByDesc('dev.valor_dev')       
                ->get();
               //dd($devengado);
                $embargo = DB::connection('oracle')->table('facweb_haberes_embargo')               
                ->where('identificacion', '=', $cedula) 
                ->where('ano_nomina', '=', $ano)
                ->where('mes_nomina', '=', $mes) 
                ->where('tipo_nomina', '=', $tnomina)              
                ->get();
               
                               
                $totaDevengado = 0;
                $totalDescuentos = 0;
                if (count($devengado) > 0) {
                    foreach ($devengado as $value) {
                        $totaDevengado += $value->valor_dev;                       
                    }
                }

                if (count($descuentos) > 0) {
                    foreach ($descuentos as $value) {
                        $totalDescuentos += $value->valor_desc;
                    }
                }

                $activo =DB::connection('oracle')->table('FACWEB_EMPLEADOS_V')
                ->select('activo')               
                ->where('cedula', '=', $cedula)               
                ->first();

                if ( $activo->activo == "NO") {
                    $dataGrado =DB::connection('oracle')->table('facweb_certifica_tiempo_vr')               
                    ->where('cedula', '=', $cedula)               
                    ->first();
                }else{
                    $dataGrado = DB::connection('oracle')->table('facweb_certifica_laboral_v1')               
                    ->where('cedula', '=', $cedula)               
                    ->first();
                }

                
              
                $data = array(
                    'embargo' => $embargo,
                    'devengado' => $devengado,
                    'totaDevengado' => $totaDevengado,
                    'totalDescuentos' => $totalDescuentos,
                    'descuentos' => $descuentos,
                    'dataGrado'  => $dataGrado
                );
               
            break;            
        }       
        
        return $data;
    }

   

    public function mesNumero($mes) {
        $mes = strtoupper($mes);
        $numero = 0;
        switch($mes){
           /* case'ENE';
                $numero = '01';
            break;
            case 'FEB';
                $numero = '02';
            break;
            case'MAR';
                $numero = '03';
            break;
            case 'ABR';
                $numero = '04';
            break;
            case'MAY';
                $numero = '05';
            break;
            case 'JUN';
                $numero = '06';
            break;
            case'JUL';
                $numero = '07';
            break;
            case 'AGO';
                $numero = '08';
            break;
            case'SEP';
                $numero = '09';
            break;
            case 'OCT';
                $numero = '10';
            break;
            case'NOV';
                $numero = '11';
            break;
            case 'DIC';
                $numero = '12';
            break;  */
            
            case'JAN';
                $numero = '01';
            break;
            case 'FEB';
                $numero = '02';
            break;
            case'MAR';
                $numero = '03';
            break;
            case 'APR';
                $numero = '04';
            break;
            case'MAY';
                $numero = '05';
            break;
            case 'JUN';
                $numero = '06';
            break;
            case'JUL';
                $numero = '07';
            break;
            case 'AUG';
                $numero = '08';
            break;
            case'SEP';
                $numero = '09';
            break;
            case 'OCT';
                $numero = '10';
            break;
            case'NOV';
                $numero = '11';
            break;
            case 'DEC';
                $numero = '12';
            break;

        }
        
        return $numero;
    }

    public function search_meses(Request $request){
        try{
            $ano = $request->ano;
            $nomina = $request->nomina;
            $cedula = auth()->user()->cedula;
            if ($ano == '') {
            return Redirect::back()->withErrors(['Seleccione un ano']);
            }
            if ($nomina == '') {
            return Redirect::back()->withErrors(['Seleccione el tipo de nómina.']);
            } 
       
            $meses = DB::connection('oracle')->table('facweb_haberes_devengado as dev')
            ->select('dev.mes_nomina')          
            ->where('dev.ano_nomina', '=', $ano)
            ->where('dev.tipo_nomina', '=', $nomina)
            ->where('dev.cc', '=', $cedula)
            ->distinct()
            ->orderByDesc('dev.mes_nomina') 
            ->get();

            if (count($meses) > 0 ) {
                $response = array(
                    'error' => '0',
                    'msn' => $meses
                );        
                echo json_encode($response);
                exit;
            
            }else{
                $response = array(
                    'error' => '1',
                    'msn' => 'No se encontraron meses para el año y tipo de nómina seleccionados.'
                );        
                echo json_encode($response);
                exit;
            }           

            } catch(QueryException $ex){ 
                $response = array(
                    'error' => '1',
                    'msn' => 'Ocurrió un error en la consulta, comuníquese con el administrador del sistema'
                ); 
                
                echo json_encode($response);
                exit;            
            } 
        
    }

    public function search_anos(Request $request)
    {
        try {           
            $nomina = $request->nomina;
            $cedula = auth()->user()->cedula;            
            if ($nomina == '') {
                 return Redirect::back()->withErrors(['Seleccione el tipo de nómina.']);
            }
                    
            $anos = DB::connection('oracle')->table('facweb_haberes_devengado as dev')
            ->select('dev.ano_nomina')  
            ->where('dev.tipo_nomina', '=', $nomina)
            ->where('dev.cc', '=', $cedula)
            ->distinct()
            ->orderByDesc('dev.ano_nomina') 
            ->get();

            if (count($anos) > 0 ) {
                $response = array(
                    'error' => '0',
                    'msn' => $anos
                );        
                echo json_encode($response);
                exit;
            
            }else{
                $response = array(
                    'error' => '1',
                    'msn' => 'No se encontraron años para el tipo de nómina seleccionados.'
                );        
                echo json_encode($response);
                exit;
            } 

        } catch(QueryException $ex){ 
            $response = array(
                'error' => '1',
                'msn' => 'Ocurrió un error en la consulta, comuníquese con el administrador del sistema'
            ); 
            
            echo json_encode($response);
            exit;            
        } 
       
    }

}
 