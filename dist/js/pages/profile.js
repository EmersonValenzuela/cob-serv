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
	let canva = cropper.getCroppedCanvas();
	let image = document.getElementById("img-cropper");
	let input = document.getElementById("input-file");

	canva.toBlob(function (blob) {
		var reader = new FileReader();
		reader.readAsDataURL(blob);
		reader.onloadend = function () {
			var base64data = reader.result;

			$.ajax({
				url: "admin/dashboard/upImgUser",
				method: "POST",
				data: { image: base64data },
				success: function (data) {
					$("#crop-image").attr("src", data);
					$("#crop-img").attr("src", data);

					image.src = "";
					input.value = "";
					cropper.destroy();

					$("#modalP").addClass("remove");
					$("#modal-content").addClass("remove");

					$("#modalP").removeClass("active");
					$("#modal-content").removeClass("active");
					successMsg(
						"Imagen de Perfil Actualizado",
						"Su imagen de perfil ha sido actualizado correctamente",
						"#ff6849",
						"success"
					);
				},
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
		wrapp = $(".wrapp_"),
		img = $("#img_wrapp");

	canva.toBlob(function (blob) {
		var reader = new FileReader();
		reader.readAsDataURL(blob);
		reader.onloadend = function () {
			var base64data = reader.result;

			$.ajax({
				url: "admin/dashboard/upImgSign",
				method: "POST",
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
