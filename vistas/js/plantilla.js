/*=============================================
PLANTILLA
=============================================*/
$('[data-toggle="tooltip"]').tooltip();

$.ajax({

	url:"ajax/plantilla.ajax.php",
	success:function(respuesta){

		var colorFondo = JSON.parse(respuesta).colorFondo;
		var colorTexto = JSON.parse(respuesta).colorTexto;
		var barraSuperior = JSON.parse(respuesta).barraSuperior;
		var textoSuperior = JSON.parse(respuesta).textoSuperior;
		
	$(".backColor, .backColor a").css({"background": colorFondo,
											"color": colorTexto})

		$(".barraSuperior, .barraSuperior a").css({"background": barraSuperior, 
			                                       "color": textoSuperior})
 
	}


})

var btnList=$(".btnList");

for (let i = 0; i < btnList.length; i++) {
	
	$("#btnGrid"+i).click(function () { 

		var numero=$(this).attr("id").substr(-1);
		$(".list"+numero).hide();
		$(".grid"+numero).show();
		$("#btnGrid"+numero).addClass("blackColor");
		$("#btnGrid"+numero).removeClass("blackColor");

	 });
	 $("#btnList"+i).click(function () { 

		var numero=$(this).attr("id").substr(-1);

		$(".list"+numero).show();
		$(".grid"+numero).hide();
		$("#btnGrid"+numero).removeClass("blackColor");
		$("#btnGrid"+numero).addClass("blackColor");
	 });
	
}
$(window).scroll(function () { 	

	var scrollY=window.pageYOffset;
	if (window.matchMedia("(min-width:768px)").matches) {
		if(scrollY<($(".banner").offset().top)-10){
			$(".banner img").css({"margin-top":-scrollY/5+"px"})
		}else{
			scrollY=0;
		}
	}

 })
 $.scrollUp({
	 scrollText:"",
	 scrollSpeed:2000,
	 easingType:"easeOutQuint"
 });