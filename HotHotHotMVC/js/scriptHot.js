$( document ).ready(function() {

	function getRandomInt(max) {
		return Math.floor(Math.random() * Math.floor(max));
	}
	var minExterieur=$( "#capteurExt h3").html();
	var maxExterieur=$( "#capteurExt h3").html();
	var minInterieur=$( "#capteurInt h3").html();
	var maxInterieur=$( "#capteurInt h3").html();

	var tabExt =[];
	var tabInt =[];

	setInterval(function(){
		$( "#capteurExt h3").html(getRandomInt('50')+"°C");
		$( "#capteurInt h3").html(getRandomInt('50')+"°C");

		if(parseInt($( "#capteurExt h3").html()) < parseInt(minExterieur)){
			minExterieur = $( "#capteurExt h3").html();
		}
		if(parseInt($( "#capteurExt h3").html()) > parseInt(maxExterieur)){
			maxExterieur = $( "#capteurExt h3").html();
		}
		if(parseInt($( "#capteurInt h3").html()) < parseInt(minInterieur)){
			minInterieur = $( "#capteurInt h3").html();
		}
		if(parseInt($( "#capteurInt h3").html()) > parseInt(maxInterieur)){
			maxInterieur = $( "#capteurInt h3").html();
		}

		$( ".maxExterieur").html(maxExterieur);
		$( ".minExterieur").html(minExterieur);
		$( ".maxInterieur").html(maxInterieur);
		$( ".minInterieur").html(minInterieur);

		$.getJSON('json/alerte.json',function(alert){
			if (parseInt($( "#capteurExt h3").html()) > parseInt("35°C")) {
				$(".alerteExt").html(alert.alerte[0].nom);
			}
			if (parseInt($( "#capteurExt h3").html()) < parseInt("0°C")) {
				$(".alerteExt").html(alert.alerte[1].nom);
			}
			if (parseInt($( "#capteurExt h3").html()) > parseInt("22°C")) {
				$(".alerteExt").html(alert.alerte[2].nom);
			}
			if (parseInt($( "#capteurExt h3").html()) > parseInt("50°C")) {
				$(".alerteExt").html(alert.alerte[3].nom);
			}
			if (parseInt($( "#capteurExt h3").html()) < parseInt("12°C")) {
				$(".alerteExt").html(alert.alerte[4].nom);
			}

			if (parseInt($( "#capteurInt h3").html()) > parseInt("35°C")) {
				$(".alerteInt").html(alert.alerte[0].nom);
			}
			if (parseInt($( "#capteurInt h3").html()) < parseInt("0°C")) {
				$(".alerteInt").html(alert.alerte[1].nom);
			}
			if (parseInt($( "#capteurInt h3").html()) > parseInt("22°C")) {
				$(".alerteInt").html(alert.alerte[2].nom);
			}
			if (parseInt($( "#capteurInt h3").html()) > parseInt("50°C")) {
				$(".alerteInt").html(alert.alerte[3].nom);
			}
			if (parseInt($( "#capteurInt h3").html()) < parseInt("12°C")) {
				$(".alerteInt").html(alert.alerte[4].nom);
			}

		});

		if (tabExt.length < 10){
			tabExt.push(parseInt($( "#capteurExt h3").html()));
		}else
		{
			tabExt.shift();
			tabExt.push(parseInt($( "#capteurExt h3").html()));
			console.log(tabExt);
		}
		if (tabInt.length < 10){
			tabInt.push(parseInt($( "#capteurInt h3").html()));
		}else
		{
			tabInt.shift();
			tabInt.push(parseInt($( "#capteurInt h3").html()));
		}

	},2000);


	setInterval(function (){
		$(".minibar").html("");
		tabExt.forEach(function (element) {
			$(".minibar").append("<div class=\"minibar__bar\">\n" + "<span class=\"minibar__tooltip\">" + element + "°C</span>" +
				"<div class=\"minibar__fill\" style=\"height:" + element * 1.4 + "%\"></div>\n" +
				"</div>");
		});
	},2000);

	setInterval(function (){
		$(".minibar2").html("");
		tabInt.forEach(function (element) {
			$(".minibar2").append("<div class=\"minibar__bar\">\n" + "<span class=\"minibar__tooltip\">" + element + "°C</span>" +
				"<div class=\"minibar__fill\" style=\"height:" + element * 1.4 + "%\"></div>\n" +
				"</div>");
		});
	},2000);

	$( ".capteur" ).click(function() {
		if ($(this).data('capteur') == "Exterieur"){
			$( ".minibar" ).css('visibility' , 'visible');
			$( ".minibar2" ).css('visibility' , 'hidden');
		}else{
			$( ".minibar2" ).css('visibility' , 'visible');
			$( ".minibar" ).css('visibility' , 'hidden');
		}

		$( "#black" ).addClass( "visable" );
		$( "#popup" ).addClass( "visable" );
		$( "#popup .title" ).html($(this).data('capteur'));

			$( "#popup h3").html($(this).find("h3").html());
			$( "#popup .alerte").html($(this).find(".alerte").html());

	});
  	$( "#black, .close" ).click(function() {
   		$( "#black" ).removeClass( "visable" );
   		$( "#popup" ).removeClass( "visable" );
   	});

   	$('.base').click(function() {
  $(this).parent('.menu').toggleClass('active');
});

$(".profil").on('click',function (){
	document.location.href= '?url=profil';
});

$(".deco").on('click', function () {
		$.ajax({
			url: '/php/logout.php',
			method: 'get'
		}).done(function () {
			window.location.href = '/login.html';
		});
	})
});
