<?php

namespace sistemaReserva\Http\Controllers;

use Illuminate\Http\Request;

use sistemaReserva\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sistemaReserva\Http\Requests\PerfilFormRequest;
use sistemaReserva\User;
use sistemaReserva\Facultad;
use sistemaReserva\Carrera;
use Auth;
use DB;
use Mail;

class PerfilController extends Controller
{
    public function __construct(){
   	$this->middleware('auth');
   }

   public function index(Request $request){
   	if($request){
   		$usuarios=DB::table('users as u')
      ->leftjoin('facultad as f','u.idfacultad','=','f.idfacultad')
      ->leftjoin('carrera as c','u.idcarrera','=','c.idcarrera')
      ->select('u.id','u.name','u.email','u.telefono','f.nombre as facultad','c.nombre as carrera')
      ->where('u.email','=', Auth::user()->email)
      ->where('u.estado','=','A')->get();
      if(Auth::user()->idtipousuario>2){
   		return view('menu.perfiles.index',["usuarios"=>$usuarios]);
      }
      else{
      return Redirect::to('/logout');
      }
   	}
   }

   public function getStates($id) {
        $carreras = DB::table('carrera')
        ->where('idfacultad',$id)
        ->where('estado','=','A')
        ->pluck('nombre','idcarrera');
        return json_encode($carreras);
    }

   public function edit($id){
      $usuario=User::findOrFail($id);
      $separa=explode(".",$usuario->name);
      $usunombre=$separa[0];
      $usuapellido=$separa[1];
      $facultades=DB::table('facultad')->where('estado','=','A')->get();
      $carreras=DB::table('carrera as c')
      ->select('c.idcarrera','c.nombre','c.idfacultad')
      ->where('c.estado','=','A')
      ->where('c.idfacultad','=',$usuario->idfacultad)->get();
      if(Auth::user()->idtipousuario>2){
      return view("menu.perfiles.edit",["usuario"=>$usuario,"facultades"=>$facultades,"carreras"=>$carreras,"usunombre"=>$usunombre,"usuapellido"=>$usuapellido]);
      }
      else{
      return Redirect::to('/logout');
      }
   }

   public function update(PerfilFormRequest $request, $id){
      $usuario=User::findOrFail($id);
      $usuario->name=$request->get('name').".".$request->get('apellido');
      $usuario->telefono=$request->get('telefono');
      $usuario->idfacultad=$request->get('idfacultadedit');
      $usuario->idcarrera=$request->get('idcarreraedit');
      $usuario->update();

      $facultad=Facultad::findOrFail($usuario->idfacultad);
      $carrera=Carrera::findOrFail($usuario->idcarrera);
      Mail::send('email.mensajeusuedit',['usuario' => $usuario,'facultad'=>$facultad,'carrera'=>$carrera],
        function ($m) use ($usuario) {
          $m->to($usuario->email, $usuario->name)
            ->subject('Actualización exitosa')
            ->from('roseroesteban@gmail.com', 'Administrador');
        }
      );
      
      return Redirect::to('menu/perfiles');
   }
}
