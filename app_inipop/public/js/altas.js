
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

   				const urls = location.href+'/consulta_facultad';
   				
                    $.ajax({
                       		//url:'{{ route('consulta_facultad') }}',
                    		url:urls,
                        	method:'POST',
                       		 data:{id:valor_a_buscar,_token:$('input[name="_token"]').val()}
                    }).done(function(res)
                        {
                              var arreglo=JSON.parse(res);
                              

                      
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
        
        const urls = location.href+'/consulta_sede';
                    $.ajax({
                       url:urls,
                        method:'POST',
                        data:{id:facultad_id,_token:$('input[name="_token"]').val()},
                    }).done(function(res){
                      var arreglo_sede=JSON.parse(res);
                      

                      
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