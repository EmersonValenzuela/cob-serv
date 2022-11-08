$(function () {

	//Validando si existe la Cedula en BD antes de enviar el Form
	$("#cip").on("keyup", function () {
		var cip = $("#cip").val();
		var dataCip = "cip=" + cip;
		$.ajax({
			url: "site/validateCip",
			type: "GET",
			data: dataCip,
			dataType: "JSON",
			success: function (data) {
				if (data.success == 1) {
					$("#respuesta").html(data.message);
					$("input").attr("disabled", true); //Desabilito el input nombre
					$("input#cip").attr("disabled", false); //Habilitando el input cedula
					$("#btnone").attr("disabled", true); //Desabilito el Botton
				} else {
					$("#respuesta").html(data.message);
					$("input").attr("disabled", false); //Habilito el input nombre
					$("#btnone").attr("disabled", false); //Habilito el Botton
				}
			},
			error: function (data) {
				console.log(data["responseText"]);
			},
		});
	});
	$("#dni").on("keyup", function () {
		var dni = $("#dni").val();
		var dataDni = "dni=" + dni;
		$.ajax({
			url: "site/validateDni",
			type: "GET",
			data: dataDni,
			dataType: "JSON",
			success: function (data) {
				if (data.success == 1) {
					$("#respuestadni").html(data.message);
					$("input").attr("disabled", true); //Desabilito el input nombre
					$("input#dni").attr("disabled", false); //Habilitando el input cedula
					$("button").attr("disabled", true); //Desabilito el Botton
				} else {
					$("#respuestadni").html(data.message);
					$("input").attr("disabled", false); //Habilito el input nombre
					$("button").attr("disabled", false); //Habilito el Botton
				}
			},
			error: function (data) {
				console.log(data["responseText"]);
			},
		});
	});
	$("#mail").on("keyup", function () {
		var mail = $("#mail").val();
		var dataMail = "mail=" + mail;
		$.ajax({
			url: "site/validateMail",
			type: "GET",
			data: dataMail,
			dataType: "JSON",
			success: function (data) {
				if (data.success == 1) {
					$("#respuestamail").html(data.message);
					$("input").attr("disabled", true); //Desabilito el input nombre
					$("input#mail").attr("disabled", false); //Habilitando el input cedula
					$("button").attr("disabled", true); //Desabilito el Botton
				} else {
					$("#respuestamail").html(data.message);
					$("input").attr("disabled", false); //Habilito el input nombre
					$("button").attr("disabled", false); //Habilito el Botton
				}
			},
			error: function (data) {
				console.log(data["responseText"]);
			},
		});
	});
	$("#phone").on("keyup", function () {
		var phone = $("#phone").val();
		var dataPhone = "phone=" + phone;
		$.ajax({
			url: "site/validatePhone",
			type: "GET",
			data: dataPhone,
			dataType: "JSON",
			success: function (data) {
				if (data.success == 1) {
					$("#respuestaphone").html(data.message);
					$("input").attr("disabled", true); //Desabilito el input nombre
					$("input#phone").attr("disabled", false); //Habilitando el input cedula
					$("button").attr("disabled", true); //Desabilito el Botton
				} else {
					$("#respuestaphone").html(data.message);
					$("input").attr("disabled", false); //Habilito el input nombre
					$("button").attr("disabled", false); //Habilito el Botton
				}
			},
			error: function (data) {
				console.log(data["responseText"]);
			},
		});
	});
});

$(document).ready(() => {

	$("#msform").on("submit", (e) => {
		e.preventDefault();
		var f = $(this);

		let base_url = window.location.origin;
		let formData = new FormData(document.getElementById("msform"));
		formData.append("dato", "valor");
		let check = $("#chk").prop("checked"),
			phone = $("#phone").val();

		if (check) {
			$.ajax({
				url: "site/initReg",
				type: "post",
				dataType: "json",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: () => {
					$("#anterior").attr("disabled", "disabled");
					$("#anterior").attr("type", "hidden");
					$("#register").attr("disabled", "disabled");
					$("#register").attr("value", "Guardando .....");
				},
			})
				.done((res) => {
					if ((res.status = 1)) {
                        $(location).attr('href',window.location.origin);
					} else {
						alert(res.error);
					}
				})
				.fail((res) => {
					alert(res);
				});
		} else {
			successMsg(
				"Error",
				"Acepte la Política de Privacidad",
				"#ff6849",
				"error"
			);
		}
	});

});


function successMsg(d, f, g, h) {
	$.toast({
		heading: d,
		text: f,
		position: "top-right",
		loaderBg: g,
		icon: h,
		hideAfter: 3500,
		stack: 6,
	});
}
