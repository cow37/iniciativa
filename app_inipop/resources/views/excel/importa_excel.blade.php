@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-8">
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
               
	<form action="{{url('importar/excel')}}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="row mb-3">
		<input type="file" name="documento">
		
		
		</div>
		<div class="row mb-3">
			
		<button type="submit">Importar</button>
		</div>
	</form>
</div>
</div>
</div>
@endsection