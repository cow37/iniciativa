<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Participante;
use App\Models\Cedula_habilitada;
use Carbon\Carbon;
use Auth,DB,PDF,QrCode;
use Illuminate\Support\Facades\Storage;
class DocumentoController extends Controller
{
    /**
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //validar si existe la cedula
        $nrocedula=$request->input('nrocedula');

        //validamos con al base de stje
        $consultadocumentotsje=Cedula_habilitada::where('cedula',$nrocedula)->get();
        if (count($consultadocumentotsje)==0){

          return back()->with('message','Ese número de cédula corresponde a una persona que aún no ha firmado')->with('typealert','danger')->withInput(); 
        }

        $existecedula="SI";

        $consultadocumento=Documento::where('nro_cedula',$nrocedula)->get();

        if (count($consultadocumento)>0){
            //return $consultadocumento;
             return back()->with('message','Esa cédula ya ha sido registrada con anterioridad, por otro voluntario')->with('typealert','danger')->withInput();
        }else{
        //validar si ya se esta utilizando
        $yaseutilizo="No";
        //insertamos nuevo documento
         $emailusuario=Auth::user()->email;
         
    
         $cod_participante = Participante::where('correo_electronico', $emailusuario)->get();
       
         $documento=new Documento;
             $documento->cod_participante= $cod_participante['0']->{'cod_participante'};
             $documento->nro_cedula=$nrocedula;
             $documento->nombre_apellido=$consultadocumentotsje['0']->{'nombre'}.' '.$consultadocumentotsje['0']->{'apellido'};
              $documento->verificado=$existecedula;
               $documento->participando=$yaseutilizo;
             
             if($documento->Save()):
                //return back()->with('message','La cedula fue registrada con exito!!')->with('typealert','success')->withInput();
                return redirect('/home');
            endif;
       }
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
     public function GenerarCerficado_pdf()
    {



       $datos_certificados=DB::table('documento as d')
            ->join('participante as p','p.cod_participante','=','d.cod_participante')
            ->join('facultad as f','f.cod_facultad','=','p.cod_facultad')
            ->join('universidad as u','u.cod_universidad','=','p.cod_universidad')            
            ->select(DB::raw("concat(p.nombres,' ',p.apellidos) nombres"),'p.nro_cedula','f.nombre_facultad','u.nombre_universidad',DB::raw('count(d.nro_cedula) as cantidad_registrada'))
            ->where('d.cod_participante','=','1')
             ->groupBy(DB::raw("concat(p.nombres,' ',p.apellidos)"),'p.nombres','p.nro_cedula','f.nombre_facultad','u.nombre_universidad')
            ->get();
           // $pdf = PDF::loadView('registro.PDFS.Certificado', ['datos_certificados'=>$datos_certificados]);
/*return PDF::loadView('vista-pdf', $data)
        ->stream('archivo.pdf');*/
//return $datos_certificados;
         $nombre=url('/register/verifypdf/').'/'.$datos_certificados[0]->{'nro_cedula'};
        //$nombre=$datos_certificados[0]->{'nro_cedula'}.'-'.$datos_certificados[0]->{'nombres'};
        $qrcode = base64_encode(QrCode::format('png')->size(200)->errorCorrection('H')->generate($nombre));
$carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $pdf = PDF::loadView('registro.PDFS.Certificado', ['datos_certificados'=>$datos_certificados,'qrcode'=>$qrcode,'nombres'=>$nombre])->save(storage_path('app/public/') . $datos_certificados[0]->{'nro_cedula'}.'.pdf');
        
        //return $pdf->stream();
       // return $pdf->download('I_PaCobrar'.$date.'.pdf');

         return $pdf->stream('Certificado_'.$date.'.pdf');
    }

    
    public function verifypdf($code)
    {
        //return $code;
        return "el documento esta verificado correctamente";
    }
}
