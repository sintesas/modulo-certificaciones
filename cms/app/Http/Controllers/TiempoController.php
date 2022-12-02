<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\tiempo;
use Illuminate\Support\Facades\DB;
class TiempoController extends Controller

{

    

    public function __construct()

    {

        $this->middleware('role');

    }

    

    public function index()

    {

        return view('new');

    }

    

    public function save(Request $request)

    {

        if ($file = $request->file('file') == null) {

            $url = null ;

        }else{

            $file = $request->file('file');
            $path = public_path() . '/storage/tiempo';
            $url = uniqid() . $file->getClientOriginalName();
            $moved = $file->move($path, $url);
            //dd($moved);

            //$file = $request->file('file');
            //$url = $file->getClientOriginalName();
            //\Storage::disk('tiempo')->put($url,  \File::get($file));

        }


        tiempo::create([

            'tipo' =>$request->input('tipo'),
            'url' => $url,
            'cedula' => $request->input('cedula'),


            ]);



         return redirect('/Admin/Tiempo/listar');

    }



    public function create()

    {

        $id =null;

        $tiempo =null;

        return view('tiempo.create',["id"=>$id,"Tiempo"=>$tiempo]);;

    }



    public function list()

    {

        $tiempos=tiempo::all();
        $tiemposn = [];
        
        foreach ($tiempos as $key => $value) {
            $datosFirmante = DB::connection('oracle')->table('facweb_certifica_tiempo_v1')                              
                ->where('cedula', '=', $value->cedula)               
                ->first();
                $tiemposn[] = [
                    'id' => $value->id,
                    'tipo' => $value->tipo,
                    'url' => $value->url,
                    'cedula' => $value->cedula,
                    'role' => $value->role,
                    'nombre' => $value->nombre_apellidos,
                    'grado'=>$value->grado];
            }
    
        return view('tiempo.list',['Tiempo'=>$tiemposn]);

    }

    

    public function edit($id)

    {

        $tiempo = tiempo::find($id);

        return view('tiempo.create',["id"=>$id,"Tiempo"=>$tiempo]);

    }



    public function delete($id)

    {

        $tiempo = new tiempo;
        $tiempo->find($id)->delete();
        /*return response()->json([

            'message' => 'Articulo Eliminado'

          ]);*/ 
        return back();

    }



    public function update(Request $request, $id)

    {

        $tiempo = tiempo::find($id);

        if ($file = $request->file('file') == null) {

            if ($tiempo['url'] == null){

                $url = null ;

             }else{

                $url = $tiempo['url'];

             }

        }else{

            $file = $request->file('file');
            $path = public_path() . '/storage/tiempo';
            $url = uniqid() . $file->getClientOriginalName();
            $moved = $file->move($path, $url);

            //$file = $request->file('file');
            //$url = $file->getClientOriginalName();
            //\Storage::disk('tiempo')->put($url,  \File::get($file));

        }

        



        $tiempo->update([

            'url' =>$url,

            'tipo' =>$request->input('tipo'),
            'cedula' => $request->input('cedula'),

            ]);



         return redirect('/Admin/Tiempo/listar');

    }

}
