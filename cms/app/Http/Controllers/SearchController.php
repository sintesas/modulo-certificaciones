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

class SearchController extends Controller
{
    public function search_document(Request $request){

        try{ 
            
            
            $token = $request->token;                                            
            $doc = LogDocuments::where('token',$token)->first();            
            if ($doc) { 
                $response = array(
                    'error' => '0',
                    'msn' => 'Validación exitosa, este certificado pertenece al documento numero CC:'.$doc->cedula. ' fecha de generación :'. $doc->created_at. ', certificado de '. $doc->descripcion
                );        
                echo json_encode($response);
                exit;
            }else{
                $response = array(
                    'error' => '1',
                    'msn' => 'Documento no encontrado.'
                );
                
                echo json_encode($response);                
                exit;  
            }

            echo json_encode($response);
            exit;

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
