$(function() {
    // Punto 1.
    // Crear código para filtrar pacientes por nombre.
    $("#filtro").keyup(function(){
    	if ($(this).val()){
    		var nombre = $(this).val().toLowerCase();
    		$('.paciente').hide();
    		$('.nombre').each(function(index, element) {
				 if($(element).text().toLowerCase().indexOf(nombre) !== -1){
				 	return $(element).parent().show("slow");
				 }
			});
    	}
    	if (!$(this).val()){
    		$('.paciente').show("slow");
    	}
    });
    $("#filtro_edad").keydown(function(event){
    	if (event.which === 13) {
    		var dato = $(this).val();
    		 $.ajax({
				type: "POST",
    		 	url: "controlador.php", 
    		 	data: "edad="+dato, 
    		 	success: function(result){
    				$("#all_pacientes").html(result);
		    	}
			});
	   	}
    });
});