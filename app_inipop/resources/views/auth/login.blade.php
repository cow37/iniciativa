@extends('layouts.app_login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                  <img class="rounded mx-auto d-block" src="{{URL::asset('/imagenes/Logo Participa Py.png')}}" alt="" height="60" width="140">
                   <img class="rounded mx-auto d-block" src="{{URL::asset('/imagenes/Mas_Educacion_Logo.png')}}" alt="" height="200" width="200">
                  <h5 class="text-center"><p>PLATAFORMA DE GESTIÓN PARA VOLUNTARIOS <br>
                   DEL PROYECTO DE LEY DE INICIATIVA POPULAR <br>
                   “MÁS EDUCACIÓN, MENOS BUROCRACIA”
</p>
                    </h2>
                   <div class="row justify-content-center">
    
    <div class="col-8" >
     
     
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row">
                            <div class="col-md-0 offset-md-4" align="left">
                                <button type="submit" class="btn btn-primary">
                                    Ingresá
                                </button>
                                <a  type="button" class="btn btn-primary" href="{{ url('/registro/alta') }}">
                                    Registrate 
                                    
                                </a>
                                @if (Route::has('password.request'))

                                    <br><a class="btn btn-link" href="{{ route('password.request') }}">
                                        ¿Olvidaste tu Password? Hacé click aquí
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                
            </div>
    
  </div>
                    <br>
                
                    
                    <div class="row">
                        <div class="col-12  text-center"><h6> La iniciativa popular es un mecanismo constitucional de democracia participativa, que concede a los ciudadanos el derecho de proponer al Congreso proyectos de ley . (Art. 123 Constitución Nacional)</h6>
</div>

                    </div>   
                  
                
           
        </div> </div> 

</div>
@endsection
