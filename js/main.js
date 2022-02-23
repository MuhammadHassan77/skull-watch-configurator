let c = 0;
let i = setInterval(function () {
	$(".loading-page .counter h1").html(c + "%");
	$(".loading-page .counter hr").css("width", c + "%");
	c++;
	if (c == 101) { clearInterval(i); $("#loader").addClass("d-none"); }
}, 40);


$(document).on("click", ".showSvgSkull", function() {
	$(this).parent().parent().hide();
	$(".mySkull").removeClass("d-none");
	$(".skullPng").addClass("d-none");
});

$(document).on("click", ".showPngSkull", function() {
	$(this).parent().parent().hide();
	$(".skullPng").removeClass("d-none");
	$(".mySkull").addClass("d-none");
});

//zoom in and zoom out function
$(document).ready(function () {
	$("#zoomIn").click(function () {
		var div = $(".tail img,.tail svg");
		// var div = $(".tail");
		startAnimation();
		function startAnimation() {
			div.css({
				"transform": "scale(1.3)",
				"-webkit-transform": "scale(1.3)",
				"-moz-transform": "scale(1.3)",
				"transition": "all 0.3s",
				"-webkit-transition": "all 0.3s",
				"-moz-transition": "all 0.3s"
			});
		}
	});

	$("#zoomOut").click(function () {
		var div = $(".tail img,.tail svg");
		// var div = $(".tail");
		startAnimation();
		function startAnimation() {
			div.css({
				"transform": "scale(1)",
				"-webkit-transform": "scale(1)",
				"-moz-transform": "scale(1)",
				"transition": "all 0.3s",
				"-webkit-transition": "all 0.3s",
				"-moz-transition": "all 0.3s"
			});
		}
		// if ($(window).width() < 576) $(".stylewatch").css("color", "black");
	});
});

function startAnimation(div) {
	div.css({
		"transform": "scale(1.48)",
		"-webkit-transform": "scale(1.48)",
		"-moz-transform": "scale(1.48)",
		"transition": "all 0.3s",
		"-webkit-transition": "all 0.3s",
		"-moz-transition": "all 0.3s"
	});
}

/*Close Configurator function*/
$(document).on("click", '.arrow-collapse, .cls-btn', function () {
	// $('.arrow-collapse, .cls-btn').click(function(){
	$(".style-1").removeClass('active-style');
	// $(".tabsrt").addClass('d-none');
	$(".tabsrt,.color-popup,.watchmodels").addClass('d-none');
	$(".watchskull,.skullParts,.skullColor,#myRange").hide();
	$('#myCanvas').css('transform', 'translateX(0%)');
	$('.dot-menu').css('transform', 'translateX(0%)');

});

/*Configurator work start*/
$(document).on('click', '#desk-sx svg g', function () {
	$(".color-popup").removeClass('d-none');
	$(".watchskull,.right-popup,.skullColor,#myRange,.my-option").hide();
	$('#myCanvas').css('transform', 'translateX(-5%)');
	$('.dot-menu').css('transform', 'translateX(-160%)');
	id = $(this).attr("id");
	let lumi_id = $(this).attr("style-id");
	let hands_id = $(this).attr("style-id");
	let sechand_id = $(this).attr("style-id");
	// id = $(this).attr("data-id");
	// if ($(window).width() < 576) {
	// 	$(".stylewatch").css("color", "white");
	// }
	let watchid = $('.watch-svg').attr("data-watch");

	var div = $(".tail img,.tail svg");
	startAnimation(div);
	$(".resetCanvas").css("background-color", "#d3d3d394");

	console.log(id);
	if (id == "svg-skull") {
		$('#myCanvas').css('transform', 'translateX(-15%)');
		$(".right-popup,.color-popup").hide();
		$('.watchskull,#myRange,.skullTypeSelection').show();

	} else if (id == "svg-case") {
		$(".right-popup,.color-popup").hide();
		$(`.watchwcases[data-id="${watchid}"],.my-option`).show();
		// $('.watchwcases').eq(--watchid).show();
	} else if (id == "svg-strap") {
		$("#zoomOut").trigger("click");
		$(".right-popup,.color-popup").hide();
		$(`.watchstrap[data-id="${watchid == 3 ? watchid = 1 : watchid = watchid}"],.my-option`).show();
		// $('.watchstrap').eq(--watchid).show();
	} else if (id == "svg-bezel") {
		$(".right-popup,.color-popup").hide();
		$(`.watchbezel[data-id='${watchid}'],.my-option`).show();
		// $('.watchbezel').eq(--watchid).show();
	} else if (id == "svg-winder") {
		$(".right-popup,.color-popup").hide();
		$(`.watchwinder[data-id='${watchid}'],.my-option`).show();
		// ($('.watchwinder').eq(--watchid).show());
	} else if (id == "svg-lumi") {
		$(".right-popup,.color-popup").hide();
		$(`.watchlumi[style-id="${lumi_id}"]`).show();
	} else if (id == "svg-hour") {
		$(".right-popup,.color-popup").hide();
		$(`.watchhands[style-id="${hands_id}"]`).show();
	} else if (id == "svg-min") {
		$(".right-popup,.color-popup").hide();
		$(`.watchhands[style-id="${hands_id}"]`).show();
	} else if (id == "svg-sechand") {
		$(".right-popup,.color-popup").hide();
		$(`.secondhand[style-id="${sechand_id}"]`).show();
	} else if (id == "svg-tip") {
		$(".right-popup,.color-popup").hide();
		$('.watchtip').show();
	} else if (id == "svg-face") {
		$(".right-popup,.color-popup").hide();
		$('.watchface').show();
	}

})

$(document).on("click", ".bothhands", function () {
	let style_id = $(this).attr('style-id');
	// console.log(style_id)

	var div = $(".tail img,.tail svg");
	startAnimation(div);

	if (style_id == 1) {
		// $("#secHand").hide();
		$("#handLumi,#svg-lumi,#handTip,#svg-tip,li a[data-watch='svg-lumi'],li a[data-watch='svg-tip']").show();
		$("#handLumi").attr("src", "./data/Hand lumi/1.png");
		$("#minHand,#hourHand").attr("src", "./data/Hands/1.png");
		$("g#svg-min,g#svg-hour,g#svg-lumi,a[data-watch='svg-lumi'],a[data-watch='svg-hands']").attr("style-id", style_id);
	} else if (style_id == 2) {
		$("#handLumi,#svg-lumi,#handTip,#svg-tip,li a[data-watch='svg-lumi'],li a[data-watch='svg-tip']").hide();
		$("#minHand,#hourHand").attr("src", "./data/Hands/24.png");
		$("g#svg-min,g#svg-hour").attr("style-id", style_id);
	} else if (style_id == 3) {
		$("#handLumi,#svg-lumi,#handTip,#svg-tip,li a[data-watch='svg-lumi'],li a[data-watch='svg-tip']").hide();
		$("#minHand,#hourHand").attr("src", "./data/Hands/47.png");
		$("g#svg-min,g#svg-hour").attr("style-id", style_id);
	} else if (style_id == 4) {
		$("#handLumi,#svg-lumi,#handTip,#svg-tip,li a[data-watch='svg-lumi'],li a[data-watch='svg-tip']").hide();
		$("#minHand,#hourHand").attr("src", "./data/Hands/70.png");
		$("g#svg-min,g#svg-hour").attr("style-id", style_id);
	} else if (style_id == 5) {
		$("#handLumi,#svg-lumi,li a[data-watch='svg-lumi']").show();
		$("#handTip,#svg-tip,li a[data-watch='svg-tip']").hide();
		$("#handLumi").attr("src", "./data/Hand lumi/22.png");
		$("#minHand,#hourHand").attr("src", "./data/Hands/93.png");
		// $("#secHand").attr("src", "./data/Second hand/1.png");
		$("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
		$("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "2");
		// $("g#svg-sechand,a[data-watch='svg-sechand']").attr("style-id", style_id);
	} else if (style_id == 6) {
		$("#handLumi,#svg-lumi,li a[data-watch='svg-lumi']").show();
		$("#handTip,#svg-tip,li a[data-watch='svg-tip']").hide();
		$("#handLumi").attr("src", "./data/Hand lumi/43.png");
		$("#minHand,#hourHand").attr("src", "./data/Hands/114.png");
		$("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
		$("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "3");
	} else if (style_id == 7) {
		$("#handLumi,#svg-lumi,li a[data-watch='svg-lumi']").show();
		$("#handTip,#svg-tip,li a[data-watch='svg-tip']").hide();
		$("#handLumi").attr("src", "./data/Hand lumi/64.png");
		$("#minHand,#hourHand").attr("src", "./data/Hands/135.png");
		// $("#secHand").attr("src", "./data/Second hand/24.png");
		$("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
		$("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "4");
		// $("g#svg-sechand,a[data-watch='svg-sechand']").attr("style-id", style_id);
	} else if (style_id == 8) {
		$("#handLumi,#svg-lumi,li a[data-watch='svg-lumi']").show();
		$("#handTip,#svg-tip,li a[data-watch='svg-tip']").hide();
		$("#handLumi").attr("src", "./data/Hand lumi/85.png");
		$("#minHand,#hourHand").attr("src", "./data/Hands/156.png");
		// $("#secHand").attr("src", "./data/Second hand/47.png");
		$("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
		$("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "5");
		// $("g#svg-sechand,a[data-watch='svg-sechand']").attr("style-id", style_id);
	} else if (style_id == 9) {
		$("#handLumi,#svg-lumi,li a[data-watch='svg-lumi']").show();
		$("#handTip,#svg-tip,li a[data-watch='svg-tip']").hide();
		$("#handLumi").attr("src", "./data/Hand lumi/106.png");
		$("#minHand,#hourHand").attr("src", "./data/Hands/177.png");
		$("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
		$("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "6");
	} else if (style_id == 10) {
		$("#handLumi,#svg-lumi,li a[data-watch='svg-lumi']").show();
		$("#handTip,#svg-tip,li a[data-watch='svg-tip']").hide();
		$("#handLumi").attr("src", "./data/Hand lumi/127.png");
		$("#minHand,#hourHand").attr("src", "./data/Hands/198.png");
		$("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
		$("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "7");
	} else if (style_id == 11) {
		$("#handLumi,#svg-lumi,li a[data-watch='svg-lumi']").show();
		$("#handTip,#svg-tip,li a[data-watch='svg-tip']").hide();
		$("#handLumi").attr("src", "./data/Hand lumi/148.png");
		$("#minHand,#hourHand").attr("src", "./data/Hands/219.png");
		$("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
		$("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "8");
	} else if (style_id == 12) {
		$("#handLumi,#svg-lumi,li a[data-watch='svg-lumi']").show();
		$("#handTip,#svg-tip,li a[data-watch='svg-tip']").hide();
		$("#handLumi").attr("src", "./data/Hand lumi/183.png");
		$("#minHand,#hourHand").attr("src", "./data/Hands/254.png");
		$("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
		$("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "9");
	} else if (style_id == 13) {
		$("#handLumi,#svg-lumi,li a[data-watch='svg-lumi']").show();
		$("#handTip,#svg-tip,li a[data-watch='svg-tip']").hide();
		$("#handLumi").attr("src", "./data/Hand lumi/206.png");
		$("#minHand,#hourHand").attr("src", "./data/Hands/277.png");
		$("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
		$("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "10");
	}

	// $(".watchhands, .watchmodels").hide();
	// ($(".watchhands[style-id='" + style_id + "']").show());
	$("li a[data-watch='svg-hands']").attr("style-id", style_id);
})

$(document).on("click", ".sechand", function () {
	var div = $(".tail img,.tail svg");
	startAnimation(div);

	let url = $(this).find('img.img-fluid').attr("src");
	let style_id = $(this).attr("style-id");
	$("#secHand").attr("src", url);
	$("g#svg-sechand,a[data-watch='svg-sechand']").attr("style-id", style_id);
})

/*Configurator work end*/
$(document).on('click', '.stylewatch', function () {
	$('#myRange').hide();
	$(".right-popup,.color-popup").hide();
	$('.watchmodels').show();
})

$(document).on('click', '.newControlMenu', function () {
	$(".color-popup").removeClass('d-none');
	$(".watchskull,#myRange").hide();

	if ($(window).width() > 576) {
		$("#closeCarousel").trigger("click");
		$('#myCanvas').css('transform', 'translateX(-5%)');
		$('.dot-menu').css('transform', 'translateX(-120%)');
	}
	var div = $(".tail img,.tail svg");
	startAnimation(div);
	$(".resetCanvas").css("background-color", "#d3d3d394");

	style_id = $(this).attr("style-id");

	watchid = $('.watch-svg').attr("data-watch");

	com_name = $(this).attr("data-watch");

	// console.log(watchid, com_name);

	if (com_name == "svg-skull") {

		$(".right-popup,.color-popup").hide();
		$('.watchskull').show();
		$('#myRange').show();
		$('#myCanvas').css('transform', 'translateX(-15%)');

	} else if (com_name == "svg-case") {

		$(".right-popup,.color-popup").hide();
		$(`.watchwcases[data-id="${watchid}"]`).show();
		// $('.watchwcases').eq(--watchid).show();

	} else if (com_name == "svg-strap") {

		$("#zoomOut").trigger("click")
		$(".right-popup,.color-popup").hide();
		$(`.watchstrap[data-id="${watchid == 3 ? watchid = 1 : watchid = watchid}"]`).show();
		// $('.watchstrap').eq(--watchid).show();

	} else if (com_name == "svg-bezel") {

		$(".right-popup,.color-popup").hide();
		$(`.watchbezel[data-id="${watchid}"]`).show();
		// ($('.watchbezel').eq(--watchid).show());

	} else if (com_name == "svg-winder") {

		$(".right-popup,.color-popup").hide();
		$(`.watchwinder[data-id="${watchid}"]`).show();
		// ($('.watchwinder').eq(--watchid).show());
	} else if (com_name == "svg-lumi") {

		$(".right-popup,.color-popup").hide();
		$(`.watchlumi[style-id="${style_id}"]`).show();

	} else if (com_name == "svg-hands") {

		$(".right-popup,.color-popup").hide();
		$(`.watchhands[style-id="${style_id}"]`).show();

	} else if (com_name == "svg-hour") {

		$(".right-popup,.color-popup").hide();
		$('.watchhands').show();

	} else if (com_name == "svg-min") {

		$(".right-popup,.color-popup").hide();
		$('.watchhands').show();

	} else if (com_name == "svg-sechand") {

		$(".right-popup,.color-popup").hide();
		$(`.secondhand[style-id="${style_id}"]`).show();

	} else if (com_name == "svg-tip") {

		$(".right-popup,.color-popup").hide();
		$('.watchtip').show();

	} else if (com_name == "svg-face") {

		$(".right-popup,.color-popup").hide();
		$('.watchface').show();

	} else {
		console.log(com_name + " Not Matched");
	}

})

$(".mySwitch2 input").click(function () {
	if ($(this).prop("checked") == true) {
		$(".forMen").hide();
		$(".forWomen").show();
		// $("#toggleCaseType").text("FOR MEN");
	} else if ($(this).prop("checked") == false) {
		$(".forWomen").hide();
		$(".forMen").show();
		// $("#toggleCaseType").text("FOR WOMEN");
	}
});

// Swipe Function for mobile

// jquerySwipeHandler.handleSwipe("#caseCarousel", [
// 	jquerySwipeHandler.SWIPE_LEFT,
// 	jquerySwipeHandler.SWIPE_RIGHT,
// ], function (direction) {
// 	// console.log(direction);
// 	if ($(window).width() <= 576) {
// 		if (direction == 'SWIPE_LEFT') {
// 			let i = $("#caseCarousel").find(".carousel-item.active").index();
// 			$(".applyCase").eq(++i).trigger("click");
// 		} else if (direction == 'SWIPE_RIGHT') {
// 			let i = $("#caseCarousel").find(".carousel-item.active").index();
// 			$(".applyCase").eq(--i).trigger("click");
// 		}
// 	}
// });

// jquerySwipeHandler.handleSwipe("#skullCarousel", [
// 	jquerySwipeHandler.SWIPE_LEFT,
// 	jquerySwipeHandler.SWIPE_RIGHT,
// ], function (direction) {
// 	// console.log(direction);
// 	if ($(window).width() <= 576) {
// 		// $("#zoomOut").trigger("click");
// 		if (direction == 'SWIPE_LEFT') {
// 			// let i = $("#skullCarousel").find(".carousel-item.active").index();
// 			// $("#skullCarousel .carousel-item").removeClass("active");
// 			// $("#skullCarousel .carousel-item").eq(++i).addClass("active");
// 			// $(".bothhands").eq(++i).trigger("click");
// 			let i = $(".watchskull").find(".model-box.active-model").index();
// 			console.log(i)
// 			$(".watchskull").find(".model-box").eq(++i).trigger("click");
// 			$("#skullCarousel button[data-bs-slide='next']").trigger("click");
// 		} else if (direction == 'SWIPE_RIGHT') {
// 			// let i = $("#skullCarousel").find(".carousel-item.active").index();
// 			// $("#skullCarousel .carousel-item").removeClass("active");
// 			// $("#skullCarousel .carousel-item").eq(--i).addClass("active");
// 			// $(".bothhands").eq(--i).trigger("click");
// 			let i = $(".watchskull").find(".model-box.active-model").index();
// 			console.log(i)
// 			$(".watchskull").find(".model-box").eq(--i).trigger("click");
// 			$("#skullCarousel button[data-bs-slide='prev']").trigger("click");
// 		}
// 		$("#skull,#pngSkull").hide();
// 		$("#myRange").hide();
// 	}
// });


// $(document).on("click", '.swipe', function () {
// 	$(".right-popup,.color-popup").hide();
// 	console.log($(".watch-svg").hide());
// 	// $("#case,.swipe,#skull,#pngSkull").hide();
// 	// $("#caseCarousel").css("display", "flex");
// 	$("#zoomOut,#closeCarousel").trigger("click");
// 	// console.log($(this).text())
// 	if ($(this).text() == "CASE") {
// 		$("#case").hide();
// 		$("#caseCarousel").css("display", "flex");
// 	} else if ($(this).text() == "SKULL") {
// 		$("#skull,#pngSkull").hide();
// 		$("#skullCarousel").css("display", "flex");
// 	} else if ($(this).text() == "HANDS") {
// 		$("#minHand,#hourHand").hide();
// 		$("#handsCarousel").css("display", "flex");
// 	}
// 	$("#closeCarousel").show();
// });

// jquerySwipeHandler.handleSwipe("#handsCarousel", [
// 	jquerySwipeHandler.SWIPE_LEFT,
// 	jquerySwipeHandler.SWIPE_RIGHT,
// ], function (direction) {
// 	// console.log(direction);
// 	if ($(window).width() <= 576) {
// 		// $("#zoomOut").trigger("click");
// 		if (direction == 'SWIPE_LEFT') {
// 			let i = $("#handsCarousel").find(".carousel-item.active").index();
// 			$(".bothhands").eq(++i).trigger("click");
// 		} else if (direction == 'SWIPE_RIGHT') {
// 			let i = $("#handsCarousel").find(".carousel-item.active").index();
// 			$(".bothhands").eq(--i).trigger("click");
// 		}
// 	}
// });

// $(document).on("click", '#closeCarousel', function () {
// 	$(this).hide();
// 	$(".mycarousel").css("display", "none");
// 	$("#case ,#skull ,#pngSkull ,#minHand ,#hourHand ,.watch-svg ,.selectCarousel").show();
// })

// model loading function

/*Delete work of all components*/
// $(document).on('click', '.BezelDeleteId', function () {
// 	BezelDeleteId = $(this).attr('data-delete-bezel');
// 	$.ajax({
// 		type: "POST",
// 		url: "DeleteComponents.php",
// 		data: { BezelDeleteId: BezelDeleteId },
// 		success: function (result) {
// 			alert(result);
// 		}
// 	})
// })
// $(document).on('click', '.WatchCaseDeleteId', function () {
// 	WatchCaseDeleteId = $(this).attr('data-delete-watchcase');
// 	$.ajax({
// 		type: "POST",
// 		url: "DeleteComponents.php",
// 		data: { WatchCaseDeleteId: WatchCaseDeleteId },
// 		success: function (result) {
// 			alert(result);
// 		}
// 	})
// })

// $(document).on('click', '.DiaBezelDeleteId', function () {
// 	DiaBezelDeleteId = $(this).attr('data-delete-diabezel');
// 	$.ajax({
// 		type: "POST",
// 		url: "DeleteComponents.php",
// 		data: { DiaBezelDeleteId: DiaBezelDeleteId },
// 		success: function (result) {
// 			alert(result);
// 		}
// 	})
// })

///////////////////////////////////////////


// /*Delete work of all components*/

// $(document).on('click', '.BezelDeleteId', function () {
// 	BezelDeleteId = $(this).attr('data-delete-bezel');
// 	$.ajax({
// 		type: "POST",
// 		url: "DeleteComponents.php",
// 		data: { BezelDeleteId: BezelDeleteId },
// 		success: function (result) {
// 			alert(result);
// 		}
// 	})
// })
// $(document).on('click', '.WatchCaseDeleteId', function () {
// 	WatchCaseDeleteId = $(this).attr('data-delete-watchcase');
// 	$.ajax({
// 		type: "POST",
// 		url: "DeleteComponents.php",
// 		data: { WatchCaseDeleteId: WatchCaseDeleteId },
// 		success: function (result) {
// 			alert(result);
// 		}
// 	})
// })

// $(document).on('click', '.DiaBezelDeleteId', function () {
// 	DiaBezelDeleteId = $(this).attr('data-delete-diabezel');
// 	$.ajax({
// 		type: "POST",
// 		url: "DeleteComponents.php",
// 		data: { DiaBezelDeleteId: DiaBezelDeleteId },
// 		success: function (result) {
// 			alert(result);
// 		}
// 	})
// })






// /*Configurator work start*/
// $(document).on('click', '#desk-sx svg g', function () {
// 	$(".color-popup").removeClass('d-none');
// 	$(".watchskull").hide();
// 	$('#myCanvas').css('transform', 'translateX(-5%)');
// 	id = $(this).attr("id");
// 	// id = $(this).attr("data-id");
// 	watchid = $('.watch-svg').attr("data-watch");
// 	// alert(id);
// 	console.log(id);
// 	if (id == "svg-skull") {
// 		// alert("svg-skull")
// 		$('.watchskull').show();
// 		$('.watchstrap').hide();
// 		$('.watchmodels').hide();
// 		$('.watchbezel').hide();
// 		$('#myRange').show();
// 		$('.watchface').hide();
// 		$('.watchwinder').hide();
// 		$('.watchwcases').hide();
// 		$('.watchlumi').hide();
// 		$('.watch-hour-mint').hide();
// 		$('.watchtip').hide();
// 		$('#myCanvas').css('transform', 'translateX(-15%)');

// 	} else if (id == "svg-case") {
// 		$('.watchstrap').hide();
// 		$('.watchskull').hide();
// 		$('.watchbezel').hide();
// 		$('#myRange').hide();
// 		$('.watchface').hide();
// 		$('.watchwinder').hide();
// 		$('.watchwcases').hide();
// 		$('.watchmodels').hide();
// 		$('.watchlumi').hide();
// 		$('.watch-hour-mint').hide();
// 		$('.watchtip').hide();

// 		$('.watchwcases').eq(--watchid).show();
// 	} else if (id == "svg-strap") {
// 		// alert("svg-strap")
// 		// $('.watchstrap').show();
// 		$('.watchskull').hide();
// 		$('.watchmodels').hide();
// 		$('.watchbezel').hide();
// 		$('#myRange').hide();
// 		$('.watchface').hide();
// 		$('.watchwinder').hide();
// 		$('.watchwcases').hide();
// 		$('.watchlumi').hide();
// 		$('.watch-hour-mint').hide();
// 		$('.watchtip').hide();

// 		$('.watchstrap').eq(--watchid).show();

// 	} else if (id == "svg-bezel") {
// 		$('.watchbezel').hide();
// 		$('.watchskull').hide();
// 		$('.watchstrap').hide();
// 		$('.watchmodels').hide();
// 		$('#myRange').hide();
// 		$('.watchface').hide();
// 		$('.watchwinder').hide();
// 		$('.watchwcases').hide();
// 		$('.watchlumi').hide();
// 		$('.watch-hour-mint').hide();
// 		$('.watchtip').hide();

// 		$('.watchbezel').eq(--watchid).show();

// 	} else if (id == "svg-lumi") {
// 		$('.watchmodels').hide();
// 		$('.watchskull').hide();
// 		$('.skullSize').hide();
// 		$('.watchstrap').hide();
// 		$('.watchbezel').hide();
// 		$('.watchface').hide();
// 		$('#myRange').hide();
// 		$('.watchwinder').hide();
// 		$('.watchwcases').hide();
// 		$('.watchtip').hide();
// 		$('.watch-hour-mint').hide();
// 		$('.watchlumi').show();
// 	} else if (id == "svg-hour") {
// 		$('.watchmodels').hide();
// 		$('.watchskull').hide();
// 		$('.skullSize').hide();
// 		$('.watchstrap').hide();
// 		$('.watchbezel').hide();
// 		$('.watchface').hide();
// 		$('#myRange').hide();
// 		$('.watchwinder').hide();
// 		$('.watchwcases').hide();
// 		$('.watchtip').hide();
// 		$('.watchlumi').hide();
// 		$('.watchhands').show();
// 	} else if (id == "svg-min") {
// 		$('.watchmodels').hide();
// 		$('.watchskull').hide();
// 		$('.skullSize').hide();
// 		$('.watchstrap').hide();
// 		$('.watchbezel').hide();
// 		$('.watchface').hide();
// 		$('#myRange').hide();
// 		$('.watchwinder').hide();
// 		$('.watchwcases').hide();
// 		$('.watchtip').hide();
// 		$('.watchlumi').hide();
// 		$('.watchhands').show();
// 	} else if (id == "svg-tip") {
// 		// alert("svg-face");
// 		$('.watchtip').show();
// 		$('.watchface').hide();
// 		$('.watchstrap').hide();
// 		$('.watchskull').hide();
// 		$('.watchmodels').hide();
// 		$('.watchbezel').hide();
// 		$('#myRange').hide();
// 		$('.watchwinder').hide();
// 		$('.watchwcases').hide();
// 		$('.watchlumi').hide();
// 		$('.watch-hour-mint').hide();


// 	} else if (id == "lumi") {
// 		// alert("lumi");
// 		$('.watchface').hide();
// 		$('.watchstrap').hide();
// 		$('.watchskull').hide();
// 		$('.watchmodels').hide();
// 		$('.watchbezel').hide();
// 		$('#myRange').hide();
// 		$('.watchwinder').hide();
// 		$('.watchwcases').hide();
// 		$('.watchlumi').hide();
// 		$('.watchlumi').show();
// 		$('.watchtip').hide();
// 		$('.watch-hour-mint').hide();

// 	} else if (id == "svg-winder") {
// 		// alert("svg-winder");
// 		$('.watchbezel').hide();
// 		$('.watchskull').hide();
// 		$('.watchstrap').hide();
// 		$('.watchmodels').hide();
// 		$('#myRange').hide();
// 		$('.watchface').hide();
// 		$('.watchwcases').hide();
// 		$('.watchlumi').hide();
// 		$('.watchtip').hide();
// 		$('.watch-hour-mint').hide();


// 		console.log($('.watchwinder').eq(--watchid).show());
// 	} else if (id == "svg-face") {
// 		// alert("svg-face");
// 		$('.watchface').show();
// 		$('.watchstrap').hide();
// 		$('.watchskull').hide();
// 		$('.watchmodels').hide();
// 		$('.watchbezel').hide();
// 		$('#myRange').hide();
// 		$('.watchwinder').hide();
// 		$('.watchwcases').hide();
// 		$('.watchlumi').hide();
// 		$('.watch-hour-mint').hide();
// 		$('.watchtip').hide();


// 	}

// })

// $(document).on("click", ".bothhands", function () {
// 	let style_id = $(this).attr('style-id');
// 	console.log(style_id)
// 	if (style_id == 1) {
// 		$("#handLumi,#svg-lumi,#handTip,#svg-tip").show();
// 		$("#hourHand").attr("src", "./data/Hour hand/1.png")
// 		$("#minHand").attr("src", "./data/Min hand/1.png")
// 	} else if (style_id == 2) {
// 		$("#handLumi,#svg-lumi,#handTip,#svg-tip").hide();
// 		$("#minHand,#hourHand").attr("src", "./data/Hands/1.png")
// 	} else if (style_id == 3) {
// 		$("#handLumi,#svg-lumi,#handTip,#svg-tip").hide();
// 		$("#minHand,#hourHand").attr("src", "./data/Hands/24.png")
// 	}
// 	else if (style_id == 4) {
// 		$("#handLumi,#svg-lumi,#handTip,#svg-tip").hide();
// 		$("#minHand,#hourHand").attr("src", "./data/Hands/47.png")
// 	}
// 	$(".watchhands, .watchmodels").hide();
// 	($(".watchhands[style-id='" + style_id + "']").show());
// })

// /*Configurator work end*/
// $(document).on('click', '.stylewatch', function () {
// 	$('.watchmodels').show();
// 	$('.watchskull').hide();
// 	$('.skullSize').hide();
// 	$('.watchstrap').hide();
// 	$('.watchbezel').hide();
// 	$('.watchface').hide();
// 	$('#myRange').hide();
// 	$('.watchwinder').hide();
// 	$('.watchwcases').hide();
// 	$('.watchlumi').hide();
// 	$('.watch-hour-mint').hide();
// 	$('.watchhands').hide();

// 	// $('.styledesign').hide();
// })

// // $(document).on('click','.applyCase',function () {
// // 	w_id = $(this).attr('data-watch');
// // 	$.ajax({
// // 		type:"POST",
// // 		url:
// // 		data:{}
// // 	})
// // })

