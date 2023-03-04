<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\cedulaImport;
use Excel;
use App\Models\Cedula_habilitada;
class CedulaHabilitadaController extends Controller
{
    //
     public function index()
    {
        // code...
        return view('excel.importa_excel');
    }
    public function importar(Request $request)
    {
        if($request->hasfile('documento')){
            $path=$request->file('documento')->getRealPath();
           Excel::import(new cedulaImport, $request->file('documento')->store('temp'));
      //return back()->with('success', '');
       return back()->with('message','Se Proceso Correctamente el archivo')->with('typealert','success')->withInput();

              
               
            }

           // Cedula_habilitada::insert($datosImportar);


    
        }
        
}
