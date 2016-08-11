$(function() {
    // Punto 1.
    // Crear código para filtrar pacientes por nombre.
    $("#filtro").keyup(function(){
    	if ($(this).val()){
    		var nombre = $(this).val().toLowerCase();
    		$('.paciente').hide();
    		$('.nombre').each(function(index, element) {
				 if($(element).text().toLowerCase().indexOf(nombre) !== -1){
				 	return $(element).parent().show();
				 }
			});
    	}
    	if (!$(this).val()){
    		$('.paciente').show();
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
    mostrar_age(0);
});

function mostrar_age(dat)
{
    if (dat) {
        $("#list_group_age").html('<a href="javascript:mostrar_age(0)"><span>Age:  </span><span>Patients quantity: </span></a>');
        $(".list_group_age_dat").show();
    }else{
        $("#list_group_age").html('<a href="javascript:mostrar_age(1)"><span>Age:  </span><span>Patients quantity: </span></a>');
        $(".list_group_age_dat").hide();

    }
}