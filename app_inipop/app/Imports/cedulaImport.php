<?php

namespace App\Imports;

use App\Models\Cedula_habilitada;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
class cedulaImport implements ToCollection ,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cedula_habilitada([
            //
        ]);
    }

    public function collection(Collection $rows){

        // Validate
    /*   Validator::make($rows->toArray(), [
          '*.username' => 'required|string',
          '*.name' => 'required|string',
          '*.email' => 'required|email',
          '*.age' => 'required|integer',
       ],[
          '*.username.required'=> "The username field is required.",
          '*.username.string'=> "The username must be string.",
          '*.name.required'=> "The name field is required.",
          '*.name.string'=> "The name must be string.",
          '*.email.required'=> "The email field is required.",
          '*.email.email'=> "The email must be a valid email address.",
          '*.age.integer'=> "The age must be an integer."
       ])->validate();*/

       foreach ($rows as $row) {

          // Check email already exists
          $count = Cedula_habilitada::where('cedula',$row['cedula'])->count();
          if($count > 0){
           // return $count;
             continue;
          }
          Cedula_habilitada::create([
             'cedula' => $row['cedula'],
             'nombre' => $row['nombre'], 
             'apellido' => $row['apellido'],
             'fecha_inscripcion' => $row['fec_inscripcion'],
             'sexo' => $row['sexo'],
             'fecha_nacimiento' => $row['fecha_nacim'],
         ]);
       }
    }

    // Specify header row index position to skip
    public function headingRow(): int {
       return 1;
    }
    
}
