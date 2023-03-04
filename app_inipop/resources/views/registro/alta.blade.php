@extends('layouts.app_login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   <h6 align="center"> PLATAFORMA DE GESTIÓN PARA VOLUNTARIOS<br>
                DEL PROYECTO DE LEY DE INICIATICA POPULAR<br>
                “MÁS EDUCACIÓN, MENOS BUROCRACIA”</h6>
                <div class="col-12 text-center"><strong> <h2>Módulo de Registro</h2> </strong></div>

                    <img class="rounded mx-auto d-block" src="{{URL::asset('/imagenes/Mas_Educacion_Logo.png')}}" alt="" height="200" width="200"></div>
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
                            <label for="nro_cedula" class="col-md-4 col-form-label text-md-end">Nro de Cédula'</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-end">Correo Electrónico</label>

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
                            <label for="nro_celular" class="col-md-4 col-form-label text-md-end">Nro de Celular</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmar Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        

                        <div class="row mb-0" align="center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar datos para registrarte
                                </button>
                                 <a type="button" href="{{url('/home')}}" class="btn btn-primary">
                                    Cancelar
                                </a>
                            </div>
                            
                        </div>
                         <div class="row">
            <div class="col-md-12">
                
                <p align="center"><strong>Una vez enviados los datos de registro, te enviaremos un e-mail desde la dirección info@participapy.com para confirmar tu e-mail y completar el registro. También te enviaremos toda la información y los instructivos para que puedas realizar la difusión de esta iniciativa popular. Ten presente que ese email podría estar en la bandeja de correos no deseados o de spam.</strong>
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
<script src="{{ asset('/js/altas.js') }}" type="text/javascript">

 
</script>


@endpush
@endsection
