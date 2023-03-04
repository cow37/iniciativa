<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Universidad;
use App\Models\Facultad;
use App\Models\Sede;
use App\Models\Iniciativa;
use App\Models\Participante;
use App\Mail\NuevoPartisipante;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use App\Mail\MailNotify;
use Validator,Str,Config,Auth,PDF,DB;
 use App\Models\User;

use Illuminate\Support\Facades\Hash;

//use Illuminate\Support\Facades\Validator;
class ParticipanteController extends Controller
{
   

    /**
     * Where to redirect users after registration.
     *
   
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $universidades=Universidad::all();
       $iniciativas=Iniciativa::all();
        //return view('registro/alta',['estados'=>$estados,'monedas'=>$monedas]);
        return view('registro/alta',['Universidades'=>$universidades,'iniciativas'=>$iniciativas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         $rules=[
            'cod_universidad'=>'required',
            'cod_facultad'=>'required',
            'carrera'=>'required',
            'nombres'=>'required',
            'apellidos'=>'required',
            'nrocedula'=>'required',
            'email'=>'required',
            'nro_celular'=>'required',
            'password'=>'required|string|min:8|confirmed'];
        $messages=[
            'cod_universidad.required'=>'Seleccione una Universidad',
            'cod_facultad.required'=>'Seleccione una Facultad',
            'carrea.required'=>'Ingrese una Carrera',
            'nombres.required'=>'Ingrese su Nombre',
            'apellidos.required'=>'Ingrese su Apellido',
            'nrocedula.required'=>'Ingrese numero de cedula',
            'email.required'=>'Ingrese un correo electronico valido',
            'nro_celular.required'=>'Ingrese Nro celular',
            'password.required'=>'ingrese un password',
            'password.confirmed'=>'El no es igual'];
        $validator=Validator::make($request->all(),$rules,$messages);
        if ($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
        else:
             $participante=new Participante;
             $participante->cod_iniciativa=$request->input('cod_iniciativa');
            $participante->cod_universidad=$request->input('cod_universidad');
            $participante->cod_facultad=$request->input('cod_facultad');
            $participante->cod_sede=$request->input('cod_sede');
            $participante->carrera=$request->input('carrera');
            $participante->nombres=$request->input('nombres');
            $participante->apellidos=$request->input('apellidos');
            $participante->nro_cedula=$request->input('nrocedula');
            $participante->correo_electronico=$request->input('email');
            $participante->nro_celular=$request->input('nro_celular');
            if($participante->Save()):
                $data = $request->all();
               // $this->validator($data);
                $this->create_user($data);
                   // return redirect('/registro/alta')->with('message','Se Guardo Con exito')->with('typealert','success');
                //$user = auth()->user();
               // Mail::to($request->input('email'))->send(new NuevoPartisipante($usuario));
                // Mail::to($request->input('email'))->send(new NuevoPartisipante($participante));
                    return redirect('/login')->with('message','Se registro exitosamente, revise su correo_electronico para validar ')->with('typealert','success');
                     //return redirect('/registro/emailenviado');
               endif;
            //return $request;
        
          //  return $data;
        endif;
    }
   /* protected function validator(array $data)
        {
            return Validator::make($data, [
                'nombres' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'password-confirm' => ['required|same:password'],
            ]);
        }*/

        /**
         * Create a new user instance after a valid registration.
         *
         * @param  array  $data
         * @return \App\User
         */
        protected function create_user(array $data)
        {
            
            $data['confirmation_code'] = Str::random(25);
        $user = User::create([
            'name' => $data['nombres'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'confirmation_code' => $data['confirmation_code']
        ]);
        // Send confirmation code
       // $pdf = PDF::loadFile('archivos/Guia del Voluntario.pdf');

    Mail::send('email.bienvenido', $data, function($message) use ($data) {
        $message->to($data['email'], $data['nombres'])->subject('Correo de Confirmacion')->attach('archivos/Guia del Voluntario.pdf');
});
    //Mail::to($request->input('email'))->send(new NuevoPartisipante($participante));
    

    return $user;
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function consulta_facultad(Request $request){
         
        
  
         $facultades=Facultad::where('cod_universidad',$request->id)->get();//
      
            return response(json_encode($facultades),200)->header('Content-type','text/plain');
           

    }
      public function consulta_sede(Request $request){
         
        

         $sedes=Sede::where('cod_facultad',$request->id)->get();//
      
            return response(json_encode($sedes),200)->header('Content-type','text/plain');
           

    }
    public function verify($code)
{
    $user = User::where('confirmation_code', $code)->first();

    if (! $user)
        return redirect('/');

    $user->confirmed = true;
    $user->confirmation_code = null;
    $user->save();

    return redirect('/login')->with('message','Se ha verificado el correo exitosamente')->with('typealert','Success')->withInput();
    
}

protected function reenviar_validacion()
        {
           
           $data['confirmation_code'] = Auth::user()->confirmation_code;
           $data['email']=Auth::user()->email;
           $data['nombres']=Auth::user()->name;
         
         
        // Send confirmation code
    Mail::send('email.confirmation_code', $data, function($message) use ($data) {
        $message->to($data['email'], $data['nombres'])->subject('Reenvio Por favor confirma tu correo');
});
    
      
    return view('registro/reenviook');
    
        }
    protected function finalizar_participacion()
        {
            
      //verificamos si ya tiene 30 cedulas cargadas
            $emailusuario=Auth::user()->email;
            $total_cedulas_cargada=DB::table('documento as d')
            ->join('participante as p','p.cod_participante','=','d.cod_participante')
            ->join('users as u','u.email','=','p.correo_electronico')
            ->select('d.cod_participante',DB::raw('count(d.cod_documento) as cantidad_registrada'))
            ->where('p.correo_electronico','=',$emailusuario)
            ->orderBy('d.cod_participante','desc')
            ->groupBy('d.cod_participante')
            ->get();
            
            if ($total_cedulas_cargada[0]->{'cantidad_registrada'}<30){

                return back()->with('message','No alcanzaste la cantidad necesaria para obtener el certificado! La cantidad es de 30 registros')->with('typealert','danger')->withInput();
            }else{
    return view('registro/finalizar');
    }
        }

}
