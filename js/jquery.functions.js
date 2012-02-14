	function ActualizarDatos(){
		var cliente_id = $('#cliente_id').attr('value');
                var tipo_id = $('#tipo_id').attr('value');
                var pais = $('#pais').attr('value');
                var estado = $('#estado').attr('value');
                var nombres = $('#nombres').attr('value');
		var ciudad = $('#ciudad').attr('value');
		var alternativas = $("input[@name='alternativas']:checked").attr("value");
		var avatar = $("#avatar").attr("value");
		var fecha_nacimiento = $("#fecha_nacimiento").attr("value");

		$.ajax({
			url: 'actualizar.php',
			type: "POST",
			data: "submit=&tipo_id="+tipo_id+"&nombres="+nombres+"&pais="+pais+"&estado="+estado+"&ciudad="+ciudad+"&alternativas="+alternativas+"&avatar="+avatar+"&fecha_nacimiento="+fecha_nacimiento+"&cliente_id="+cliente_id,
			success: function(datos){
				alert(datos);
				ConsultaDatos();
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		return false;
	}

	function ConsultaDatos(){
		$.ajax({
			url: 'consulta.php',
			cache: false,
			type: "GET",
			success: function(datos){
				$("#tabla").html(datos);
			}
		});
	}

	function EliminarDato(cliente_id){
		var msg = confirm("Desea eliminar este dato?")
		if ( msg ) {
			$.ajax({
				url: 'eliminar.php',
				type: "GET",
				data: "id="+cliente_id,
				success: function(datos){
					alert(datos);
					$("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	}

	function GrabarDatos(){
                var tipo_id = $('#tipo_id').attr('value');
                var nombres = $('#nombres').attr('value');
                var pais = $('#pais').attr('value');
                var estado = $('#estado').attr('value');
		var ciudad = $('#ciudad').attr('value');
		var alternativas = $("input[@name='alternativas']:checked").attr("value");
		var avatar = $("#avatar").attr("value");
		var fecha_nacimiento = $("#fecha_nacimiento").attr("value");

		$.ajax({
			url: 'nuevo.php',
			type: "POST",
			data: "submit=&nombres="+nombres+"&tipo_id="+tipo_id+"&pais="+pais+"&estado="+estado+"&ciudad="+ciudad+"&alternativas="+alternativas+"&avatar="+avatar+"&fecha_nacimiento="+fecha_nacimiento,
			success: function(datos){
				ConsultaDatos();
				alert(datos);
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		return false;
	}

	function Cancelar(){
		$("#formulario").hide();
		$("#tabla").show();
		return false;
	}

	// funciones del calendario
	function update_calendar(){
		var month = $('#calendar_mes').attr('value');
		var year = $('#calendar_anio').attr('value');

		var valores='month='+month+'&year='+year;

		$.ajax({
			url: 'calendario.php',
			type: "GET",
			data: valores,
			success: function(datos){
				$("#calendario_dias").html(datos);
			}
		});
	}

	function set_date(date){
		$('#fecha_nacimiento').attr('value',date);
		show_calendar();
	}

	function show_calendar(){
		$('#calendario').toggle();
	}
	
