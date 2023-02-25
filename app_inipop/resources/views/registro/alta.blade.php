@extends('layouts.app_login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   <h3 align="center"> PLATAFORMA DE GESTIÓN PARA VOLUNTARIOS
                DEL PROYECTO DE LEY DE INICIATICA POPULAR<br>
                “MÁS EDUCACIÓN, MENOS BUROCRACIA”</h3>

                    <img class="rounded mx-auto d-block" src="{{URL::asset('/imagenes/Mas_Educacion_Logo.png')}}" alt="profile Pic" height="200" width="200"></div>
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
                <div class="card-body">
                    <form action="{{url('/registro/alta/store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Iniciativa') }}</label>

                            <div class="col-md-6">
                                <select name='cod_iniciativa' id="cod_iniciativa" class="form-select" >
                                     <option value="">Elija una Iniciativa</option>
                                    @foreach($iniciativas as $iniciativa)
                                  <option selected  value="{{$iniciativa->cod_iniciativa}}">{{$iniciativa->nombre_iniciativa}}
                                      
                                  </option>
                                  @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="universidad" class="col-md-4 col-form-label text-md-end">{{ __('Universidad') }}</label>

                            <div class="col-md-6">
                                <select name='cod_universidad' id="cod_universidad" class="form-select" >
                                  
                                  <option value="">Elija una Universidad</option>
                                  @foreach($Universidades as $Universidad)
                                  <option value="{{$Universidad->cod_universidad}}" >{{$Universidad->nombre_universidad}}</option>
                                  @endforeach
                                  
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="facultad" class="col-md-4 col-form-label text-md-end">{{ __('Facultad') }}</label>

                            <div class="col-md-6">
                                <select id="cod_facultad" name='cod_facultad' class="form-select" >
                                  
                                </select>

                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="sede" class="col-md-4 col-form-label text-md-end">{{ __('Sede') }}</label>

                            <div class="col-md-6">
                                <select id="cod_sede" name='cod_sede' class="form-select" >
                                  
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="carrera" class="col-md-4 col-form-label text-md-end">{{ __('Carrera') }}</label>

                            <div class="col-md-6">
                                <input id="carrera" type="text" class="form-control @error('carrera') is-invalid @enderror" name="carrera" value="{{ old('carrera') }}" required autocomplete="carrera" autofocus>

                                @error('carrera')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nombres" class="col-md-4 col-form-label text-md-end">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres') }}" required autocomplete="nombres" autofocus>

                                @error('nombres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-end">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="nro_cedula" class="col-md-4 col-form-label text-md-end">{{ __('Nro Cedula') }}</label>

                            <div class="col-md-6">
                                <input id="nrocedula" type="text" class="form-control @error('nrocedula') is-invalid @enderror" name="nrocedula" value="{{ old('nrocedula') }}" required autocomplete="nrocedula" autofocus>

                                @error('nrocedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electronico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nro_celular" class="col-md-4 col-form-label text-md-end">{{ __('Nro Celular') }}</label>

                            <div class="col-md-6">
                                <input id="nro_celular" type="text" class="form-control @error('nro_celular') is-invalid @enderror" name="nro_celular" value="{{ old('nro_celular') }}" required autocomplete="nro_celular" autofocus>

                                @error('nro_celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        

                        <div class="row mb-0" align="center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar datos para participar
                                </button>
                                 <a type="button" href="{{url('/home')}}" class="btn btn-primary">
                                    Cancelar
                                </a>
                            </div>
                            
                        </div>
                         <div class="row">
            <div class="col-md-12">
                
                <p align="center"><strong>Una vez que completes 30 números de CI de personas a las que apoyaste para conocer más acerca de la iniciativa popular, te enviaremos un email desde la dirección info@participapy.com con un certificado que acredite que has terminado exitosamente esta actividad. Ten presente que ese email podría estar en la bandeja de correos no deseados o de spam.</strong>
</p>
            </div>
    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
 <script type="text/javascript"> 
   
    $('#cod_universidad').change(function(e){
 //alert("hola");
 var codigo_universidad=$("#cod_universidad option:selected").val();
        // alert(codigo_universidad); 
         if (! codigo_universidad){
            $('#cod_facultad').html(' <option selected value="">Elija Facultadd</option>');
            return;  
         }      
               buscar_facultad(codigo_universidad);
    })
    $('#cod_facultad').change(function(e){
// alert("hola");
 var codigo_facultad=$("#cod_facultad option:selected").val();
        // alert(codigo_universidad); 
         if (! codigo_facultad){
            $('#cod_sede').html(' <option selected value="">Elija sede</option>');
            return;  
         } 
       //  alert("aca");     
               buscar_sede(codigo_facultad);
    })
   
    function buscar_facultad(valor_a_buscar){
                    $.ajax({
                       // url:'/administrador/consulta_cotizacion',
                       url:'{{ route('consulta_facultad') }}',
                        method:'POST',
                        data:{id:valor_a_buscar,_token:$('input[name="_token"]').val()}
                    }).done(function(res){
                      var arreglo=JSON.parse(res);
                      console.log(arreglo);

                      
                     if (arreglo.length==0)
                     {
                      alert("No hay Facultades para la universidad seleccionada");
                      //$("#cod_facultad").val(0); 
                      
                     } else{
                     
                           var html_select=' <option value="" selected>Elija Facultad</option>';
                      for (var i=0;i<arreglo.length;i++)
                        html_select+='<option value="'+arreglo[i].cod_facultad+'">'+arreglo[i].nombre_facultad+'</option>';
                        $('#cod_facultad').html(html_select);          
                     
                   }
                    }) 

                        }
      function buscar_sede(facultad_id){
        //alert(facultad_id);
                    $.ajax({
                       // url:'/administrador/consulta_cotizacion',
                       url:'{{ route('consulta_sede') }}',
                        method:'POST',
                        data:{id:facultad_id,_token:$('input[name="_token"]').val()}
                    }).done(function(res){
                      var arreglo_sede=JSON.parse(res);
                      console.log(arreglo_sede);

                      
                     if (arreglo_sede.length==0)
                     {
                        var html_select=' <option value="" selected>Sin Sede</option>';
                        $('#cod_sede').html(html_select)
                      
                     } else{
                     
                           var html_select=' <option value="" selected>Elija Sede</option>';
                      for (var i=0;i<arreglo_sede.length;i++)
                        html_select+='<option value="'+arreglo_sede[i].cod_sede+'">'+arreglo_sede[i].nombre_sede+'</option>';
                        $('#cod_sede').html(html_select);          
                     
                   }
                    }) 

                        }
    </script>
@endpush
@endsection
