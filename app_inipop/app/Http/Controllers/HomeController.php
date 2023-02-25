<?php

namespace App\Http\Controllers;
use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
//use App\Http\Controllers\Auth;
use Auth,DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $confirmed=Auth::user()->confirmed;
       // return $confirmed;
        if ($confirmed==1){

            $emailusuario=Auth::user()->email;

            $cedulas_cargada=DB::table('documento as d')
            ->join('participante as p','p.cod_participante','=','d.cod_participante')
            ->join('users as u','u.email','=','p.correo_electronico')
            ->select('d.cod_documento','d.cod_participante','d.nro_cedula','d.nombre_apellido','d.verificado','d.participando')
            ->where('u.email','=',$emailusuario)
            ->orderBy('d.cod_documento','desc')
            ->groupBy('d.cod_documento')
            ->paginate(30);

         
        //return view('administrador/productos/index',['productos'=>$productos]);
            return view('/home',['cedulas_cargadas'=>$cedulas_cargada]);
        }else
            {
                return view('/registro/mailnoverificado');
            }
        
    }
    
    
}
