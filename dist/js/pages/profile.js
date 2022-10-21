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
			zoomable: false, //Para que no haga zoom
			viewMode: 1, //Para que no estire la imagen al contenedor
			responsive: false, //Para que no reacomode con zoom la imagen al contenedor
			dragMode: "none", //Para que al arrastrar no haga nada
			ready() {
				// metodo cuando cropper ya este activo, le ponemos el alto y el ancho del contenedor de cropper al 100%
				document.querySelector(".cropper-container").style.width = "100%";
				document.querySelector(".cropper-container").style.height = "100%";
			},
		});

		$(".modal").addClass("active");
		$(".modal-content").addClass("active");

		$(".modal").removeClass("remove");
		$(".modal-content").removeClass("remove");
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
					console.log(data);

					$("#crop-image").attr("src", data);
					$("#crop-img").attr("src", data);

					image.src = "";
					input.value = "";
					cropper.destroy();

					$(".modal").addClass("remove");
					$(".modal-content").addClass("remove");

					$(".modal").removeClass("active");
					$(".modal-content").removeClass("active");
				},
			});
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
		beforeSend: function () {
			
		},
	})

	.done(function (d){
		console.log(d);
	})
});

function dangerAlert() {
	Swal.fire({
		type: "error",
		title: "Oops...",
		text: "Seleccione una Imagen por favor",
	});
}
