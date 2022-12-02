<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailContacto;
use Illuminate\Support\Facades\Validator;
use Redirect;
class MailController extends Controller
{
    //
    
    public function register(Request $request)

    {
        
        $Iemail = DB::connection('oracle')->table('FACWEB_EMPLEADOS_V')->where('CEDULA', $request->cedula)->value('CORREO_INSTITUCIONAL');
        $estado = DB::connection('oracle')->table('FACWEB_EMPLEADOS_V')->where('CEDULA', $request->cedula)->value('ACTIVO');
        $Pemail = DB::connection('oracle')->table('FACWEB_EMPLEADOS_V')->where('CEDULA', $request->cedula)->value('CORREO_PERSONAL');
        if ( $estado == "SI") {
            if (!isset($Iemail)) {
                return Redirect::back()->withErrors([
                    'title' => 'Aviso',
                    'button' => 'info',
                    'text' => 'El Usuario no se Encuentra Registrado en la aplicacion',
                    ]);
            }
            
            // campo validacion
            
            $nombre = DB::connection('oracle')->table('FACWEB_EMPLEADOS_V')->where('CEDULA', $request->cedula)->value('NOMBRES');
            $str= Str::random(15);
            //$pss= '123456789';
            $Pass = Hash::make($str);
            $validar = User::where('email',$Iemail)->first();
    
            if (isset($validar)) {
                return Redirect::back()->withErrors([
                'title' => 'Aviso',
                'button' => 'info',
                'text' => 'El usuario ya se encuentra registrado',
                ]);
            }
            $usuario = new User;
            $usuario->name = $nombre;
            $usuario->cedula = $request->cedula;
            $usuario->email = $Iemail;
            $usuario->password = $Pass;
            $usuario->save();
        
            Mail::to($Iemail)->send(new EmailContacto($str));
           
            return Redirect::back()->withErrors([
                'title' => 'Aviso',
                'button' => 'success',
                'text' => 'creado correctamente',
                ]);
        }else {
            if (!isset($Pemail)) {
                return Redirect::back()->withErrors([
                    'title' => 'Aviso',
                    'button' => 'info',
                    'text' => 'El Usuario no se Encuentra Registrado en la aplicacion',
                    ]);
            }
            
            // campo validacion
            
            $nombre = DB::connection('oracle')->table('FACWEB_EMPLEADOS_V')->where('CEDULA', $request->cedula)->value('NOMBRES');
            $str= Str::random(8);
            //$pss= '123456789';
            $Pass = Hash::make($str);
            $validar = User::where('email',$Pemail)->first();
    
            if (isset($validar)) {
                return Redirect::back()->withErrors([
                'title' => 'Aviso',
                'button' => 'info',
                'text' => 'El usuario ya se encuentra registrado',
                ]);
            }
            $usuario = new User;
            $usuario->name = $nombre;
            $usuario->cedula = $request->cedula;
            $usuario->email = $Pemail;
            $usuario->password = $Pass;
            $usuario->save();
        
            Mail::to($Pemail)->send(new EmailContacto($str));
           
            return Redirect::back()->withErrors([
                'title' => 'Aviso',
                'button' => 'success',
                'text' => 'creado correctamente',
                ]);
    
        }


       
    }
}
