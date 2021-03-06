<?php

namespace sistemaReserva\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use sistemaReserva\Http\Requests\PerfilFormRequest;
use Auth;
use DB;

class NormativaUsuarioController extends Controller
{
    public function __construct(){
   	$this->middleware('auth');
   	}

   	public function index(Request $request){
   	if($request){
      	if(Auth::user()->idtipousuario>2){
   			return view('normativa.usuario.index');
      	}
      	else{
      	return Redirect::to('/logout');
      	}
   	}
   	}
}
