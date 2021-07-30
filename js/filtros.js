$(document).ready(function(){
				
				
				id_e= $("#especialidad").val();
				id_t= $("#turno").val();

				if($("#oculto")){
					id_c= $("#oculto").val();
					
					$.post("php/getCursos.php", {id_e: id_e, id_t: id_t, id_c: id_c}, function(data){
								$("#curso").html(data);
							});
				}else{
					$.post("php/getCursos.php", {id_e: id_e, id_t: id_t}, function(data){
								$("#curso").html(data);
								});
				}



				$("#especialidad").change(function () {  // Se ejecucta cuando se elige una especialidad
				

					$('#curso').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
                       // Se selecciona cursos
					$("#especialidad option:selected").each(function () {
						id_e= $(this).val();
						id_t= $("#turno").val();
						
						$.post("php/getCursos.php", {id_e: id_e, id_t: id_t}, function(data){
							$("#curso").html(data); // Se manda a la ubicacion getCursos.php 
							// Se toman los dos valores 
						});            
					});	
				});

				$("#turno").change(function () {
                      // Si selecciona un turno se toma el valor
                    id_c = $("#op_c").val();
                    console.log(id_c);
					$('#curso').find('option').remove().end().append('<option value=id_c></option>').val('id_c');
                     

                           // Se selcciona cursos
					$("#turno option:selected").each(function () {
						id_t= $(this).val(); // Valor de turno
						id_e= $("#especialidad").val();
					
						$.post("php/getCursos.php", {id_e: id_e, id_t: id_t}, function(data){
							$("#curso").html(data);
						});            
					});	
				});
	
			});