<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\laboral;
use Illuminate\Support\Facades\DB;
class LaboralController extends Controller

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
            $path = public_path() . '/storage/laboral';
            $url = uniqid() . $file->getClientOriginalName();
            $moved = $file->move($path, $url);
            //dd($moved);

            //$file = $request->file('file');
            //$url = $file->getClientOriginalName();
            //\Storage::disk('laboral')->put($url,  \File::get($file));

        }


        laboral::create([

            'tipo' =>$request->input('tipo'),
            'url' => $url,
            'cedula' => $request->input('cedula'),
            

            ]);



         return redirect('/Admin/Laboral/listar');

    }



    public function create()

    {

        $id =null;

        $laboral =null;

        return view('laboral.create',["id"=>$id,"Laboral"=>$laboral]);;

    }



    public function list()

    {

        $laboral=laboral::all();

        $laboraln = [];
        
        foreach ($laboral as $key => $value) {
            
            $datosFirmante = DB::connection('oracle')->table('facweb_certifica_tiempo_v1')                              
                ->where('cedula', '=', $value->cedula)               
                ->first();

                $laboraln[] = [
                    'id' => $value->id,
                    'tipo' => $value->tipo,
                    'url' => $value->url,
                    'cedula' => $value->cedula,
                    'nombre' => $value->nombre_apellidos,
                    'grado'=>$value->grado];
            }
    

        return view('laboral.list',['Laboral'=>$laboraln]);

    }

    

    public function edit($id)

    {

        $laboral = laboral::find($id);

        return view('laboral.create',["id"=>$id,"Laboral"=>$laboral]);

    }



    public function delete($id)

    {

        $laboral = new laboral;
        $laboral->find($id)->delete();
        /*return response()->json([

            'message' => 'Articulo Eliminado'

          ]);*/ 
        return back();

    }



    public function update(Request $request, $id)

    {

        $laboral = laboral::find($id);

        if ($file = $request->file('file') == null) {

            if ($laboral['url'] == null){

                $url = null ;

             }else{

                $url = $laboral['url'];

             }

        }else{

            $file = $request->file('file');
            $path = public_path() . '/storage/laboral';
            $url = uniqid() . $file->getClientOriginalName();
            $moved = $file->move($path, $url);

            //$file = $request->file('file');
            //$url = $file->getClientOriginalName();
            //\Storage::disk('laboral')->put($url,  \File::get($file));

        }

        



        $laboral->update([

            'url' =>$url,

            'tipo' =>$request->input('tipo'),
            
            'cedula' => $request->input('cedula'),
            ]);



         return redirect('/Admin/Laboral/listar');

    }

}
