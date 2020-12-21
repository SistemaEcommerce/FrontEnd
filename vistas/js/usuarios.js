
/*=============================================
VALIDAR EL REGISTRO DE USUARIO
=============================================*/
function registroUsuario(){
	/* validar nombre */

	var nombre=$("#regUsuario").val();

		if (nombre!="") {

			var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
			
			if (!expresion.test(nombre)) {

				$("#regUsuario").parent().before('<div class="alert alert-warning" style="color:#000000"><strong style="color:#000000">ERROR:</strong> No se permiten números ni caracteres especiales</div>')

				return false;

			}

		}else{
			
			$("#regUsuario").parent().before('<div class="alert alert-warning" style="color:#000000"><strong style="color:#000000">ATENCIÓN:</strong> Este campo es obligatorio</div>')

			return false;
		}
	/* validar email */

		var email=$("#regEmail").val();

		if (email!="") {

			var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
			
			if (!expresion.test(email)) {

				$("#regEmail").parent().before('<div class="alert alert-warning" style="color:#000000"><strong style="color:#000000">ERROR:</strong> No se permiten números ni caracteres especiales</div>')

				return false;

			}

		}else{
			
			$("#regEmail").parent().before('<div class="alert alert-warning" style="color:#000000"><strong style="color:#000000">ATENCIÓN:</strong> Este campo es obligatorio</div>')

			return false;
		}
	/* validar contraseña */

		var password=$("#regPassword").val();

		if (password!="") {

			var expresion = /^[a-zA-Z0-9]*$/;
			
			if (!expresion.test(password)) {

				$("#regPassword").parent().before('<div class="alert alert-warning" style="color:#000000"><strong style="color:#000000">ERROR:</strong> No se permiten números ni caracteres especiales</div>')

				return false;

			}

		}else{
			
			$("#regEmail").parent().before('<div class="alert alert-warning" style="color:#000000"><strong style="color:#000000">ATENCIÓN:</strong> Este campo es obligatorio</div>')

			return false;
		}

	/*	VALIDAR POLÍTICAS DE PRIVACIDAD	*/

	var politicas = $("#regPoliticas:checked").val();
	
	if(politicas != "on"){

		$("#regPoliticas").parent().before('<div class="alert alert-warning" style="margin-right: 25px;color:#000000"><strong style="color:#000000">ATENCIÓN:</strong> Debe aceptar nuestras políticas de privacidad</div>')

		return false;

	}

	return true;
}

