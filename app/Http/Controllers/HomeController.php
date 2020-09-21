<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Factoria\VistaFactoria;
use App\Http\Controllers\Factoria\AdministradorVista;
use App\Http\Controllers\Factoria\AlumnoVista;
use App\Http\Controllers\Factoria\ProfesorVista;

use Illuminate\Http\Request;
use App\PersonaRol;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rol = PersonaRol::where('ID_DNI', Auth::user()->DNI)->first();
        $rol = $rol->ID_ROL;
        //$rol = PersonaRol::where('ID_DNI', Auth::user()->DNI)->limit(1)->get();
        //$rol = PersonaRol::where('ID_DNI', Auth::user()->DNI)->get();
        //var_dump($rol);
        /* foreach($rol as $persona){
            var_dump($persona->ID_ROL);
        } */
        $usuario = Auth::user();

        $factoria = new VistaFactoria();

        $vista = $factoria->getVista($rol);//new VistaAlumno();

        

        echo $vista->retornarVista($usuario);



        /* if ($rol == "RBAC-AD") {
            return view('administrador.info', compact('usuario'));
        } else if ($rol == "RBAC-ST") {            
            return view('estudiante.info', compact('usuario'));
        } else if ($rol == "RBAC-TE") {
            return view('profesor.info', compact('usuario'));
        } */
        
        //if (Administrador::where('DNI', Auth::user()->DNI)->exists()) {
            //return view('administrador.home');
            //return view('estudiante.home');
        //} else {
            //echo "no hay vista implementada";
        //}
    }
}
