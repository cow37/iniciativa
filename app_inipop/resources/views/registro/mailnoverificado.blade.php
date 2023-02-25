@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Validacion de correo electronico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Puede reenviar un link de verificacion si desea') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar debe validar su correo electronico.') }}
                    {{ __('Si no recibiste el correo') }},
                    <form class="d-inline" method="POST" action="{{url('/register/reenviar_validacion')}}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click aqui para volver a enviar ') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection