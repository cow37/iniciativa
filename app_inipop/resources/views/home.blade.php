@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Formulario para registrar los números de cédula de identidad de las personas que ayudaste a firmar electrónicamente esta iniciativa popular. Solo serán válidos los números de cédula de identidad que, desde que te registraste, han firmado electrónicamente en la plataforma del TSJE.
</div>
            
                <div class="card-body">
                    <div class="col-12 text-center"><strong> <h3>Módulo de Carga</h2></strong></div>
                     @if(Session::has('message'))
          
                      <div class="alert alert-{{Session::get('typealert')}}" style="display: none;">
                        {{Session::get('message')}}
                        @if ($errors->any())
                          <ul>
                            @foreach($errors->all() as $error)
                              <li>{{$error}}</li>
                            @endforeach
                          </ul>
                        @endif
                        <script>
                          $('.alert').slideDown();
                          setTimeout(function(){ $('.alert').slideUp();},10000);
                        </script>
                      </div>
                    
                  @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{url('/registro/doc/store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Digitar Nro. de CI:</label>

                            <div class="col-md-6">
                                <input id="nrocedula" type="input" class="form-control" name="nrocedula" value="{{ old('nrocedula') }}" required  autofocus>

                                
                            </div>

                        </div>
                    <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="agregardoc">
                                    Agregar
                                </button>

                                 <a  class="btn btn-primary" id="gcertificado" name="gcertificado" href={{route('finaliza_participacion')}}>
                                    Finalizar
                                </a>
                                
                            </div>
                    
                    </form>
                </div>

            </div>
        </div>
          <div class="col-md-8">
            <div class="card">
                <div id="cargadas" class="card-header"> </div>
 
                <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-success table-striped" id="tbdocumentos">
                       
                      <thead>

                        <tr>
                          <th>Id</th>
                          <th>Nro cedula</th>
                          <th>Nombre y Apellido</th>
                          
                          
                          
                        </tr>
                      </thead>
                    

                      <tbody>
                       @foreach($cedulas_cargadas as $cedula_cargada)
                        <tr>
                          <td>{{$cedula_cargada->cod_documento}}</td>
                          <td>{{$cedula_cargada->nro_cedula}}</td>
                          <td>{{$cedula_cargada->nombre_apellido}}</td>
                         
                          
                          
                        </tr>
                       @endforeach 
                      </tbody>
                    </table>
                     </div>
                    
                

                
</div>
<div class="card-footer">Una vez que completes 30 números de CI de personas a las que apoyaste para conocer más acerca de la iniciativa popular, te enviaremos un email desde la dirección info@participapy.com con un certificado que acredite que has terminado exitosamente esta actividad. Ten presente que ese email podría estar en la bandeja de correos no deseados o de spam.
</div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript"> 
  /* $('#gcertificado').click(function(e){
       
    })*/

         $('#gcertificado').disabled=true;
    
    var nFilas = $("#tbdocumentos tr"). length-1;
    var nColumnas = 30-nFilas;
    var msg = "Registro cargados: "+nFilas+" - Te faltan : "+nColumnas;
   $("#cargadas").text(msg);
    const agregardoc = document.getElementById('agregardoc');
   //gcertificado.disabled = true; 
    const gcertificado = document.getElementById('gcertificado');
    //document.getElementById('gcertificado').disabled = true
  // gcertificado.disabled = true; 
    $("#nrocedula").val("");
    event.preventDefault();
    //alert(msg);
   
   /* if(nFilas==30){
        alert("aca");
        gcertificado.disabled = false; 
        agregardoc.disabled = true;
    }else if (nFilas<30)
    {
        
        gcertificado.disabled = true; 
        agregardoc.disabled = false;
    };*/
    
    </script>
@endpush
@endsection
