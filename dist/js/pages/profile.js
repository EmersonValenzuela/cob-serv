let cropper = null;

$("#input-file").on("change", () => {
	let image = document.getElementById("img-cropper");
	let input = document.getElementById("input-file");

	let archivos = input.files;
	let extensiones = input.value.substring(
		input.value.lastIndexOf("."),
		input.value.lenght
	);

	if (!archivos || !archivos.length) {
		image.src = "";
		input.value = "";
	} else if (input.getAttribute("accept").split(",").indexOf(extensiones) < 0) {
		dangerAlert();
		input.value = "";
	} else {
		let imagenUrl = URL.createObjectURL(archivos[0]);
		image.src = imagenUrl;

		cropper = new Cropper(image, {
			aspectRatio: 1, // es la proporción en la que queremos que recorte en este caso 1:1
			preview: ".img-sample", // contenedor donde se va a ir viendo en tiempo real la imagen cortada
			zoomable: true, //Para que no haga zoom
			viewMode: 1, //Para que no estire la imagen al contenedor
			responsive: false, //Para que no reacomode con zoom la imagen al contenedor
			dragMode: "move", //Para que al arrastrar no haga nada
			restore: false,
			cropBoxResizable: false,
			cropBoxMovable: false,
			rotatable: true,

			ready() {
				// metodo cuando cropper ya este activo, le ponemos el alto y el ancho del contenedor de cropper al 100%
				document.querySelector(".cropper-container").style.width = "100%";
				document.querySelector(".cropper-container").style.height = "100%";
			},
		});

		$("#modalP").addClass("active");
		$("#modal-content").addClass("active");

		$("#modal").removeClass("remove");
		$("#modal-content").removeClass("remove");
	}
});
$("#close").on("click", () => {
	let image = document.getElementById("img-cropper");
	let input = document.getElementById("input-file");

	image.src = "";
	input.value = "";

	cropper.destroy();

	$(".modal").addClass("remove");
	$(".modal-content").addClass("remove");

	$(".modal").removeClass("active");
	$(".modal-content").removeClass("active");
});

$("#cut").on("click", () => {
	let canva = cropper.getCroppedCanvas({
			width: 360,
		}),
		image = $("#crop-image"),
		img = document.getElementById("img-cropper"),
		input = $("#input-file"),
		spinner = $("#spinner_profile");

	canva.toBlob(function (blob) {
		var reader = new FileReader();
		reader.readAsDataURL(blob);
		reader.onloadend = function () {
			var base64data = reader.result;

			$.ajax({
				url: "admin/dashboard/upImgUser",
				method: "POST",
				dataType: "json",

				data: { image: base64data },

				beforeSend: () => {
					spinner.fadeIn();
					image.fadeOut();

					$("#modalP").addClass("remove");
					$("#modal-content").addClass("remove");

					$("#modalP").removeClass("active");
					$("#modal-content").removeClass("active");
				},
			})
				.done((data) => {
					if (data.status === 1) {
						spinner.fadeOut();
						image.fadeIn();

						$("#crop-image").attr("src", data.img);
						$("#crop-img").attr("src", data.img);

						img.src = "";
						input.value = "";

						cropper.destroy();

						successMsg(
							"Imagen de Perfil Actualizado",
							"Su imagen de perfil ha sido actualizado correctamente",
							"#ff6849",
							"success"
						);
					}
				})
				.fail((err) => {
					alert(base64data);
				});
		};
	});
});

//Proccess data-image-DNI

$("#input-dni").on("change", () => {
	let image = document.getElementById("img-cropp-dni");
	let input = document.getElementById("input-dni");

	let archivos = input.files;
	let extensiones = input.value.substring(
		input.value.lastIndexOf("."),
		input.value.lenght
	);

	if (!archivos || !archivos.length) {
		image.src = "";
		input.value = "";
	} else if (input.getAttribute("accept").split(",").indexOf(extensiones) < 0) {
		dangerAlert();
		input.value = "";
	} else {
		let imagenUrl = URL.createObjectURL(archivos[0]);
		image.src = imagenUrl;

		cropper = new Cropper(image, {
			aspectRatio: 16 / 9, // es la proporción en la que queremos que recorte en este caso 16/9
			preview: "#img-sample-dni", // contenedor donde se va a ir viendo en tiempo real la imagen cortada
			zoomable: true, //Para que no haga zoom
			viewMode: 1, //Para que no estire la imagen al contenedor
			responsive: false, //Para que no reacomode con zoom la imagen al contenedor
			dragMode: "move", //Para que al arrastrar no haga nada
			restore: false,
			cropBoxResizable: false,
			cropBoxMovable: false,
			rotatable: true,

			ready() {
				// metodo cuando cropper ya este activo, le ponemos el alto y el ancho del contenedor de cropper al 100%
				document.querySelector(".cropper-container").style.width = "100%";
				document.querySelector(".cropper-container").style.height = "100%";
			},
		});

		$("#modal-dni").addClass("active");
		$("#content-dni").addClass("active");

		$("#modal-dni").removeClass("remove");
		$("#content-dni").removeClass("remove");
	}
});
$("#close-dni").on("click", () => {
	let image = document.getElementById("img-cropp-dni");
	let input = document.getElementById("input-dni");

	image.src = "";
	input.value = "";

	cropper.destroy();

	$("#modal-dni").addClass("remove");
	$("#content-dni").addClass("remove");

	$("#modal-dni").removeClass("active");
	$("#content-dni").removeClass("active");
});
$("#modal-dni").init(() => {
	let modalImage = document.getElementById("img-cropp-dni");

	modalImage.onload = function () {
		$(document).on("input", "#upload-photo-image-rotate", function () {
			rotate(cropper, $(this).val());
		});

		$(document).on("change", "#upload-photo-image-rotate", function () {
			rotate(cropper, $(this).val());
		});
	};
});
$("#cut-dni").on("click", () => {
	let canva = cropper.getCroppedCanvas({
			width: 360,
		}),
		image = $("#img-cropp-dni").val(),
		input = $("#input-dni").val(),
		wrapp = $(".wrapp_"),
		img = $("#img_wrapp");

	canva.toBlob(function (blob) {
		var reader = new FileReader();
		reader.readAsDataURL(blob);
		reader.onloadend = function () {
			var base64data = reader.result;

			$.ajax({
				url: "admin/dashboard/upImgDni",
				method: "POST",
				dataType: "json",

				data: { image: base64data },

				beforeSend: () => {
					wrapp.fadeIn();
					img.fadeOut();

					$("#modal-dni").addClass("remove");
					$("#content-dni").addClass("remove");

					$("#modal-dni").removeClass("active");
					$("#content-dni").removeClass("active");
				},
			})
				.done((data) => {
					if (data.status === 1) {
						wrapp.fadeOut();
						img.fadeIn();

						$("#img-dni").attr("src", data.img);
						image.src = "";
						input.value = "";

						cropper.destroy();

						successMsg(
							"Imagen DNI Actualizado",
							"Su imagen de DNI ha sido actualizado correctamente",
							"#ff6849",
							"success"
						);
					}
				})
				.fail((err) => {
					alert(base64data);
				});
		};
	});
});

//Proccess data-image-CIP

$("#input-cip").on("change", () => {
	let image = document.getElementById("img-cropp-cip");
	let input = document.getElementById("input-cip");

	let archivos = input.files;
	let extensiones = input.value.substring(
		input.value.lastIndexOf("."),
		input.value.lenght
	);

	if (!archivos || !archivos.length) {
		image.src = "";
		input.value = "";
	} else if (input.getAttribute("accept").split(",").indexOf(extensiones) < 0) {
		dangerAlert();
		input.value = "";
	} else {
		let imagenUrl = URL.createObjectURL(archivos[0]);
		image.src = imagenUrl;

		cropper = new Cropper(image, {
			aspectRatio: 16 / 9, // es la proporción en la que queremos que recorte en este caso 1:1
			preview: "#img-sample-cip", // contenedor donde se va a ir viendo en tiempo real la imagen cortada
			zoomable: true, //Para que no haga zoom
			viewMode: 1, //Para que no estire la imagen al contenedor
			responsive: false, //Para que no reacomode con zoom la imagen al contenedor
			dragMode: "move", //Para que al arrastrar no haga nada
			restore: false,
			cropBoxResizable: false,
			cropBoxMovable: false,
			rotatable: true,

			ready() {
				// metodo cuando cropper ya este activo, le ponemos el alto y el ancho del contenedor de cropper al 100%
				document.querySelector(".cropper-container").style.width = "100%";
				document.querySelector(".cropper-container").style.height = "100%";
			},
		});

		$("#modal-cip").addClass("active");
		$("#content-cip").addClass("active");

		$("#modal-cip").removeClass("remove");
		$("#content-cip").removeClass("remove");
	}
});
$("#close-cip").on("click", () => {
	let image = document.getElementById("img-cropp-cip");
	let input = document.getElementById("input-cip");

	image.src = "";
	input.value = "";

	cropper.destroy();

	$("#modal-cip").addClass("remove");
	$("#content-cip").addClass("remove");

	$("#modal-cip").removeClass("active");
	$("#content-cip").removeClass("active");
});
$("#modal-cip").init(() => {
	let modalImage = document.getElementById("img-cropp-cip");

	modalImage.onload = function () {
		$(document).on("input", "#upload-photo-image-rotate", function () {
			rotate(cropper, $(this).val());
		});

		$(document).on("change", "#upload-photo-image-rotate", function () {
			rotate(cropper, $(this).val());
		});
	};
});
$("#cut-cip").on("click", () => {
	let canva = cropper.getCroppedCanvas({
			width: 360,
		}),
		image = $("#img-cropp-cip"),
		input = $("#input-cip"),
		wrapp = $(".wrapp_cip"),
		img = $("#img_wrapp_cip");

	canva.toBlob(function (blob) {
		var reader = new FileReader();
		reader.readAsDataURL(blob);
		reader.onloadend = function () {
			var base64data = reader.result;

			$.ajax({
				url: "admin/dashboard/upImgCip",
				method: "POST",
				dataType: "json",
				data: { image: base64data },
				beforeSend: () => {
					wrapp.fadeIn();
					img.fadeOut();

					$("#modal-cip").addClass("remove");
					$("#content-cip").addClass("remove");

					$("#modal-cip").removeClass("active");
					$("#content-cip").removeClass("active");
				},
			})
				.done((data) => {
					if (data.status === 1) {
						wrapp.fadeOut();
						img.fadeIn();

						$("#img-cip").attr("src", data.img);

						image.src = "";
						input.value = "";
						cropper.destroy();

						successMsg(
							"Imagen CIP Actualizado",
							"Su imagen de CIP ha sido actualizado correctamente",
							"#ff6849",
							"success"
						);
					}
				})
				.fail((err) => {
					alert();
				});
		};
	});
});

//Proccess data-image-SIGN

$("#input-sign").on("change", () => {
	let image = document.getElementById("img-cropp-sign");
	let input = document.getElementById("input-sign");

	let archivos = input.files;
	let extensiones = input.value.substring(
		input.value.lastIndexOf("."),
		input.value.lenght
	);

	if (!archivos || !archivos.length) {
		image.src = "";
		input.value = "";
	} else if (input.getAttribute("accept").split(",").indexOf(extensiones) < 0) {
		dangerAlert();
		input.value = "";
	} else {
		let imagenUrl = URL.createObjectURL(archivos[0]);
		image.src = imagenUrl;

		cropper = new Cropper(image, {
			aspectRatio: 16 / 9, // es la proporción en la que queremos que recorte en este caso 1:1
			preview: "#img-sample-sign", // contenedor donde se va a ir viendo en tiempo real la imagen cortada
			zoomable: true, //Para que no haga zoom
			viewMode: 1, //Para que no estire la imagen al contenedor
			responsive: false, //Para que no reacomode con zoom la imagen al contenedor
			dragMode: "move", //Para que al arrastrar no haga nada
			restore: false,
			cropBoxResizable: false,
			cropBoxMovable: false,
			rotatable: true,

			ready() {
				// metodo cuando cropper ya este activo, le ponemos el alto y el ancho del contenedor de cropper al 100%
				document.querySelector(".cropper-container").style.width = "100%";
				document.querySelector(".cropper-container").style.height = "100%";
			},
		});

		$("#modal-sign").addClass("active");
		$("#content-sign").addClass("active");

		$("#modal-sign").removeClass("remove");
		$("#content-sign").removeClass("remove");
	}
});
$("#close-sign").on("click", () => {
	let image = document.getElementById("img-cropp-sign");
	let input = document.getElementById("input-sign");

	image.src = "";
	input.value = "";

	cropper.destroy();

	$("#modal-sign").addClass("remove");
	$("#content-sign").addClass("remove");

	$("#modal-sign").removeClass("active");
	$("#content-sign").removeClass("active");
});
$("#modal-sign").init(() => {
	let modalImage = document.getElementById("img-cropp-sign");

	modalImage.onload = function () {
		$(document).on("input", "#upload-photo-image-rotate", function () {
			rotate(cropper, $(this).val());
		});

		$(document).on("change", "#upload-photo-image-rotate", function () {
			rotate(cropper, $(this).val());
		});
	};
});
$("#cut-sign").on("click", () => {
	let canva = cropper.getCroppedCanvas({
			width: 360,
		}),
		image = $("#img-cropp-sign"),
		input = $("#input-sign"),
		wrapp = $(".wrapp_sign"),
		img = $("#img_wrapp_sign");

	canva.toBlob(function (blob) {
		var reader = new FileReader();
		reader.readAsDataURL(blob);
		reader.onloadend = function () {
			var base64data = reader.result;

			$.ajax({
				url: "admin/dashboard/upImgSign",
				method: "POST",
				dataType: "json",

				data: { image: base64data },

				beforeSend: () => {
					wrapp.fadeIn();
					img.fadeOut();

					$("#modal-sign").addClass("remove");
					$("#content-sign").addClass("remove");

					$("#modal-sign").removeClass("active");
					$("#content-sign").removeClass("active");
				},
			})
				.done((data) => {
					if (data.status === 1) {
						wrapp.fadeOut();
						img.fadeIn();
						$("#img-sign").attr("src", data.img);

						image.src = "";
						input.value = "";
						cropper.destroy();

						successMsg(
							"Imagen Firma Actualizado",
							"Su imagen de Firma ha sido actualizado correctamente",
							"#ff6849",
							"success"
						);
					}
				})
				.fail((err) => {});
		};
	});
});

// tour system

hopscotch.registerHelper("addOverlay", function () {
	$("body").append('<div class="overlay"></div>');
});

hopscotch.registerHelper("removeOverlay", function () {
	$(".overlay").fadeOut(function () {
		$(this).remove();
		$(".helper").remove();
	});
});

hopscotch.listen("show", function () {
	var elementObject = $(hopscotch.getCurrTarget(tour));
	var element = $("#" + elementObject[0].id);

	element.prev().removeClass("overlay-relative");
	element.addClass("overlay-relative");

	if ($(".helper").length !== 0) {
		// Use Helper Layer for hilight target element.
		var helper = $(".helper");
		var padding = 5;
		var helperPosX = element.position().left - padding;
		var helperPosY = element.position().top - padding;
		var targetWidth = element.outerWidth();
		var targetHeight = element.outerHeight();

		console.log("PositionX : " + helperPosX + " PositionY : " + helperPosY);
		console.log(
			"TargetWidth : " + targetWidth + " TargetHeight : " + targetHeight
		);

		helper.css("width", targetWidth);
		helper.css("height", targetHeight);
		helper.offset({
			left: helperPosX,
			top: helperPosY,
		});
	} else {
		// Add Helper Layer for highlight target element.
		var newHelper = '<div class="helper"></div>';
		$("body").append(newHelper);

		var helper = $(".helper");
		var padding = 5;
		var helperPosX = element.position().left - padding;
		var helperPosY = element.position().top - padding;
		var targetWidth = element.outerWidth();
		var targetHeight = element.outerHeight();

		console.log("PositionX : " + helperPosX + " PositionY : " + helperPosY);
		console.log(
			"TargetWidth : " + targetWidth + " TargetHeight : " + targetHeight
		);

		helper.css("width", targetWidth);
		helper.css("height", targetHeight);
		helper.offset({
			left: helperPosX,
			top: helperPosY,
		});
	}
});

var tour = {
	id: "hello-hopscotch",
	showCloseButton: false,
	steps: [
		{
			title: "Mi foto",
			content: "Esta sección te permitira cambiar tu foto de perfil",
			target: "step1",
			placement: "top",
			zindex: 999999,
			yOffset: 10,
			onNext: function () {
				$("#step1").removeClass("overlay-relative");
				$(".helper").remove();
			},
		},
		{
			title: "Mis datos personales",
			content: "Esta opción te permitira cambiar tus datos personales",
			target: "step2",
			placement: "bottom",
			zindex: 999999,
			yOffset: 10,
			onNext: function () {
				$("#step2").removeClass("overlay-relative");
				$(".helper").remove();
			},
		},
		{
			title: "Formulario Editar Perfil",
			content: "Aqui modificaras tus datos personales.",
			target: "profile",
			placement: "top",
			zindex: 99999,
			yOffset: 10,
			onNext: function () {
				$("#profile").removeClass("overlay-relative");
				$("#step4").addClass("active");
				$(".helper").remove();
				$("#step2").removeClass("active");
				$("#profile").removeClass("active");
				$("#imge").addClass("active");
			},
		},
		{
			title: "Mi DNI, CIP y Firma",
			content:
				"Es obligatorio dentro del sistema tomar fotos a estos documentos.",
			target: "step4",
			placement: "top",
			zindex: 999999,
			yOffset: 10,
			xOffset: -100,
			arrowOffset: 250,
			onNext: function () {
				$("#step4").removeClass("overlay-relative");
				$(".helper").remove();
			},
		},
		{
			title: "DNI, CIP y Firma",
			content: "Seleccionar los botones de subir imagen para cada documento.",
			target: "imge",
			placement: "top",
			zindex: 999999,
			xOffset: 10,
			onNext: function () {
				$("#imge").removeClass("overlay-relative");
				$(".helper").remove();
			},
		},
		{
			title: "Sección Tramites",
			content:
				"En esta sección encontraras los distintos tramites que se pueden realizar dentro del sistema.",
			target: "step6",
			placement: "right",
			zindex: 999999,
			xOffset: 10,
			onNext: function () {
				mgr = hopscotch.getCalloutManager();

				mgr.removeAllCallouts();

				$("#step5").removeClass("overlay-relative");
				$(".helper").remove();
			},
		},
	],
	onStart: ["addOverlay"],
	onEnd: ["removeOverlay"],
};
if ($("#cod_val").val() == "") {
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: "btn btn-success",
			cancelButton: "mr-2 btn btn-danger",
		},
	});

	swalWithBootstrapButtons
		.fire({
			title: "Bienvenido al Sistema de Tramites Documentarios",
			text: "Le mostraremos un tutorial acerca del uso de la sección de perfil, Es importante que agregue la imagen de su DNI, CIP y firma para poder realizar los tramites.",
			type: "info",
			showCancelButton: true,
			confirmButtonText: "Comenzar tutorial",
			cancelButtonText: "No, cancelar",
			reverseButtons: true,
		})
		.then((result) => {
			if (result.value) {
				hopscotch.startTour(tour);
			} else if (
				// Read more about handling dismissals
				result.dismiss === Swal.DismissReason.cancel
			) {
			}

			$.ajax({
				url: "admin/dashboard/vld",
				method: "POST",
				dataType: "json",
				data: { vld: 1 },
				beforeSend: () => {},
			})
				.done((data) => {
					if (data.status == 200) {
						
					}
				})
				.fail((err) => {
					alert("Ocurrio un Error" + err.v);
				});
		});
}

//send form data PROFILE
$("#form-profile").on("submit", function (e) {
	// Cancelamos el evento si se requiere
	e.preventDefault();

	// Obtenemos los datos del formulario
	var f = $(this);
	var formData = new FormData(document.getElementById("form-profile"));
	formData.append("dato", "valor");

	// Enviamos los datos al archivo PHP que procesará el envio de los datos a un determinado correo
	$.ajax({
		url: "admin/dashboard/upProfile",
		type: "post",
		dataType: "json",
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		beforeSend: function () {},
	}).done(function (a = "a") {
		successMsg(
			"Perfil Actualizado",
			"Su perfil ha sido actualizado correctamente",
			"#ff6849",
			"success"
		);
	});
});
function rotate(cropper, degree) {
	var rotateValue = document.getElementById("upload-photo-image-rotate-value");
	var rotateValueText = document.getElementById(
		"upload-photo-image-rotate-value-text"
	);
	rotateValue.value = degree;
	rotateValueText.value = degree.replace(".", ",") + "°";
	cropper.rotateTo(degree);
}

function dangerAlert() {
	Swal.fire({
		type: "error",
		title: "Oops...",
		text: "Seleccione una Imagen por favor",
	});
}
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
