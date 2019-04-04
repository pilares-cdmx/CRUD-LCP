$(document).ready(function()
	{
		//
		$('#estados').append("<option value='0'>Elige Estado...</option>");
		$('#municipio').append("<option value='0'>Elige Municipio...</option>");
		$('#localidad').append("<option value='0'>Elige Localidad...</option>");
		$('#estados').prop('disabled', true);
		$('#municipio').prop('disabled', true);
		$('#localidad').prop('disabled', true);
		//Cargamos Paises
		var comboPaises = $("#pais");
		comboPaises.append("<option value='0'>Cargando Paises...</option>");
		$.getJSON("cargarcombos.php",{bandera:"1",filtro:""},function(objetosretorna){
			comboPaises.empty();
			comboPaises.append("<option value='0'>Elige Pais...</option>");
			$.each(objetosretorna, function(i,paises){
				var nuevaFila = "<option value='"+paises.Id+"'>" + paises.Pais+"</option>";
				comboPaises.append(nuevaFila);
			});
		});
		//Fin Cargar Paises
		//Seleccionamos Paises
		$("#pais").change(function(){
			var Pais = $("#pais").val();
			$('#estados').empty();
			if(Pais==0){
				$('#estados').append("<option value='0'>Elige Estado...</option>");
				$('#estados').prop('disabled', true);
			}else{
				$("#estados").append("<option value='0'>Cargando Estados...</option>");
				$.getJSON("cargarcombos.php",{bandera:"2", filtro: $("#pais").val()},function(objetosretorna){
					$("#estados").empty();
					$("#estados").append("<option value='0'>Elige Estado...</option>");
					$.each(objetosretorna, function(i,estados){
						$("#estados").append("<option value='"+estados.clave+"'>" + estados.nombre+"</option>");
					});
				});
				$('#estados').prop('disabled', false);
			}
			
		});
		//Fin Seleccionar pais
		//Seleccionamos estados
		$("#estados").change(function(){
			var Estado = $("#estados").val();
			$('#municipio').empty();
			if(Estado==0){
				$('#municipio').append("<option value='0'>Elige Municipio...</option>");
				$('#municipio').prop('disabled', true);
			}else{
				$("#municipio").append("<option value='0'>Cargando Municipios...</option>");
				$.getJSON("cargarcombos.php",{bandera:"3", filtro: $("#estados").val()},function(objetosretorna){
					$("#municipio").empty();
					$("#municipio").append("<option value='0'>Elige Municipio...</option>");
					$.each(objetosretorna, function(i,municipio){
						$("#municipio").append("<option value='"+municipio.clave+"'>" + municipio.nombre+"</option>");
					});
				});
				$('#municipio').prop('disabled', false);
			}
			
		});
		//Fin Seleccionar estados
		//Seleccionamos municipio
		$("#municipio").change(function(){
			var Municipio = $("#municipio").val();
			$('#localidad').empty();
			if(Municipio==0){
				$('#localidad').append("<option value='0'>Elige Localidad...</option>");
				$('#localidad').prop('disabled', true);
			}else{
				$("#localidad").append("<option value='0'>Cargando Localidad...</option>");
				$.getJSON("cargarcombos.php",{bandera:"4", filtro: $("#municipio").val()},function(objetosretorna){
					$("#localidad").empty();
					$("#localidad").append("<option value='0'>Elige Localidad...</option>");
					$.each(objetosretorna, function(i,localidad){
						$("#localidad").append("<option value='"+localidad.clave+"'>" + localidad.nombre+"</option>");
					});
				});
				$('#localidad').prop('disabled', false);
			}
			
		});
		//Fin Seleccionar municipio
	});
	
	
	$("select").on("change",function(){
        var valor=$(this).val();
        $("select").find("option[value='"+valor+"']").prop("disabled",true);
    });