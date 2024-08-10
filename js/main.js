	$(buscar_datos());
			function buscar_datos(consulta){
			    //var suma = parseInt(vl) + parseInt(v2);
				//alert("la suma es " + suma);-->
                
                $.ajax({
                  url: '../forms/buscarpaciente.php',
                  type: 'post',
                  dataType: 'html',
                	data: {consulta:consulta},      	
                })
                .done(function(respuesta){
                	$("#datos").html(respuesta);

                	})
                .fail(function(){
                	console.log("error");

                	})
                	
			}
			$(document).on('keyup','#buscar',function()
               {
               	var valor = $(this).val();
               	if (valor!="")
               	{
               		buscar_datos(valor);
               	}else{
               		buscar_datos();
               	}
               })
		