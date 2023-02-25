<div class="container">Certificado obtenido para extension
	 @foreach($datos_certificados as $datos_certificado)
	 {{$datos_certificado->nombres}}
	 <br>
	 {{$datos_certificado->nro_cedula}}
	 <br>
	  {{$datos_certificado->nombre_facultad}}
	 <br>
	   {{$datos_certificado->nombre_universidad}}
	 <br>
	 {{$datos_certificado->cantidad_registrada}}
	 	 @endforeach
	 	 <br>


<img src="data:image/png;base64, {!! $qrcode !!}">{{ $nombres }}
</div>