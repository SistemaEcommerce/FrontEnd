/*	CAPTURA DE RUTA */

var rutaActual = location.href;

$(".btnIngreso, #btnFacebookRegistro").click(function(){

	localStorage.setItem("rutaActual", rutaActual);

})
/* fotmatear input */
$("input").focus(function(){

	$(".alert").remove();
})
/* validar email repetido */

var validarEmailRepetido = false;

$("#regEmail").change(function(){

	var email = $("#regEmail").val();

	var datos = new FormData();
	datos.append("validarEmail", email);

	$.ajax({

		url:rutaOculta+"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
/* 			console.log(respuesta);
 */			if(respuesta == "false"){

				$(".alert").remove();
				validarEmailRepetido = false;

			} else{
				var modo = JSON.parse(respuesta).modo;
				
				if(modo == "directo"){

					modo = "esta página";
				}

				$("#regEmail").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, fue registrado a través de '+modo+', por favor ingrese otro diferente</div>')

					validarEmailRepetido = true;
			}

		}

	})

})

/*=============================================
VALIDAR EL REGISTRO DE USUARIO
=============================================*/
function registroUsuario(){
	/* validar nombre */

	var nombre=$("#regUsuario").val();

	if(nombre != ""){

		var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if(!expresion.test(nombre)){

			$("#regUsuario").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

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
			if(validarEmailRepetido){

				$("#regEmail").parent().before('<div class="alert alert-danger"><strong style="color:red	">ERROR:</strong> El correo electrónico ya existe en la base de datos, por favor ingrese otro diferente</div>')
	
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
