@extends('layouts.app_login')
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
	<img class="d-inline-block align-text-top text-center" src="{{URL::asset('/imagenes/Logo Participa Py.png')}}"  height="60" width="180">
	</div>
	<div><div class="col-md-12 text-center"> <br><h2>¡FELICITACIONES!</h2></div>
<div class="text-center">
<h3> <span class="strong"> COMPLETASTE EXITOSAMENTE LA ACTIVIDAD

 EN BREVE, TE ENVIAREMOS UN EMAIL CON UN CERTIFICADO QUE ACREDITE ESTE LOGRO TUYO.</span></h3>
</div><br>
<div class="text-center">
<p> El remitente será info@participapy.com. Ten presente que ese email podría estar en la bandeja de correos no deseados o de spam.</p></div>
</div>

	<div class="text-center">

	<img class="d-inline-block align-text-top text-center" src="{{URL::asset('/imagenes/Mas_Educacion_Logo.png')}}" alt="profile Pic" height="200" width="200">	
	</div>
<div class="text-center">

	<a  class="btn btn-primary" id="gcertificado" name="gcertificado" href={{route('generar_certificado')}}>
                                    Descargar Tu Certificado
                                </a>	
	</div>
	<div>
	AHORA QUE SOS UN EXPERTO CONOCEDOR DE LA INICIATIVA POPULAR, TE INVITAMOS A INFORMARTE,  APOYAR Y PROMOCIONAR ENTRE TUS CONTACTOS, 
	LAS SIGUIENTES INICIATIVAS CIUDADANAS:	
	</div>
	<div class="row">
		<div class="col-md-3"><figure class="text-center">
							  <blockquote class="blockquote">
							    <img class="d-inline-block align-text-top text-center" src="{{URL::asset('/imagenes/Imagen1.png')}}"  height="80" width="80">
							  </blockquote>
							 
							    Línea  permanente de Prevención del Suicidio y apoyo psicológico cuanto antes.
							  
							</figure></div>
		<div class="col-md-3"><figure class="text-center">
							  <blockquote class="blockquote">
							    <img class="d-inline-block align-text-top text-center" src="{{URL::asset('/imagenes/Imagen2.png')}}"  height="80" width="80">
							  </blockquote>
							 
							    Pongamos freno a la reelección indefinida de concejales.
							  
							</figure></div>
		<div class="col-md-3"><figure class="text-center">
							  <blockquote class="blockquote">
							    <img class="d-inline-block align-text-top text-center" src="{{URL::asset('/imagenes/Imagen3.png')}}"  height="80" width="80">
							  </blockquote>
							 
							    Luchemos contra la corrupción, fortaleciendo el código penal.
							  
							</figure></div>
		<div class="col-md-3">	<figure class="text-center">
							  <blockquote class="blockquote">
							    <img class="d-inline-block align-text-top text-center" src="{{URL::asset('/imagenes/Imagen4.png')}}"  height="80" width="80">
							  </blockquote>
							 
							    Por el derecho al boleto universitario.
							  
							</figure></div>
	

	

	

	
	</div>
</div>
</div>