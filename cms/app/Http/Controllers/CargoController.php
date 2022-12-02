<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\cargo;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class CargoController extends Controller

{

    //

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
            $path = public_path() . '/storage/cargo';
            $url = uniqid() . $file->getClientOriginalName();
            $moved = $file->move($path, $url);
            //dd($moved);

            //$file = $request->file('file');
            //$url = $file->getClientOriginalName();
            //\Storage::disk('cargo')->put($url,  \File::get($file));

        }


        cargo::create([

            'tipo' =>$request->input('tipo'),
            'url' => $url,
            'cedula' => $request->input('cedula'),
            

            ]);



         return redirect('/Admin/Cargo/listar');

    }



    public function create()

    {

        $id =null;

        $cargo =null;

        return view('cargo.create',["id"=>$id,"Cargos"=>$cargo]);;

    }



    public function list()

    {
    
        $cargos=cargo::all();
        $cargosn = [];
        
        foreach ($cargos as $key => $value) {
            $datosFirmante = DB::connection('oracle')->table('facweb_certifica_tiempo_v1')                              
                ->where('cedula', '=', $value->cedula)               
                ->first();
                $cargosn[] = [
                    'id' => $value->id,
                    'tipo' => $value->tipo,
                    'url' => $value->url,
                    'cedula' => $value->cedula,
                    'nombre' => $value->nombre_apellidos,
                    'grado'=>$value->grado];
            }
    
        return view('cargo.list',['Cargos'=>$cargosn]);

    }

    

    public function edit($id)

    {

        $cargo = cargo::find($id);

        return view('cargo.create',["id"=>$id,"Cargos"=>$cargo]);

    }



    public function delete($id)

    {

        $cargo = new cargo;
        $cargo->find($id)->delete();
        /*return response()->json([

            'message' => 'Articulo Eliminado'

          ]);*/ 
        return back();

    }



    public function update(Request $request, $id)

    {

        $cargo = cargo::find($id);

        if ($file = $request->file('file') == null) {

            if ($cargo['url'] == null){

                $url = null ;

             }else{

                $url = $cargo['url'];

             }

        }else{

            $file = $request->file('file');
            $path = public_path() . '/storage/cargo';
            $url = uniqid() . $file->getClientOriginalName();
            $moved = $file->move($path, $url);

            //$file = $request->file('file');
            //$url = $file->getClientOriginalName();
            //\Storage::disk('cargo')->put($url,  \File::get($file));

        }

        



        $cargo->update([

            'url' =>$url,

            'tipo' =>$request->input('tipo'),

            'cedula' => $request->input('cedula'),
            ]);



         return redirect('/Admin/Cargo/listar');

    }

    public function listuser()

    {

        $users=User::paginate(15);
        return view('listuser',['users'=>$users]);

    }

    public function buscaru(Request $request)

    {
        
        $email = $request->email;
        
        $users = User::search($email)->paginate(15);
        return view('listuser',['users'=>$users]);

    }

    public function udelete($id)

    {

        $user = new User;
        $user->find($id)->delete();
        /*return response()->json([

            'message' => 'Articulo Eliminado'

          ]);*/ 
        return back();

    }

    public function uedit($id)

    {

        $user = User::find($id);

        return view('roleuser',["id"=>$id,"user"=>$user]);

    }

    public function updateu(Request $request, $id)

    {

        $User = User::find($id);

  

        $User->update([



            'role' =>$request->input('role'),

            ]);



         return redirect('Admin/usuarios/list');

    }



}
