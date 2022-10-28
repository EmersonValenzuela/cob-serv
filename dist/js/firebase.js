window.onload = function () {
	render();
};

function render() {
	window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
		"recaptcha-container"
	);
	recaptchaVerifier.render();
}

function phoneAuth() {
	//get the number
	var number = document.getElementById("number").value;
	// alert(number);
	//it takes two parameter first one is number and second one is recaptcha
	firebase
		.auth()
		.signInWithPhoneNumber(number, window.recaptchaVerifier)
		.then(function (confirmationResult) {
			//s is in lowercase
			window.confirmationResult = confirmationResult;
			coderesult = confirmationResult;
			let btn = document.getElementById("sendC");
			btn.disabled = true;
			btn.value = "Enviando Código ...";

			setTimeout(function () {
				btn.disabled = false;
				btn.value = "Enviar";
			}, 10000);

			console.log(coderesult);

			okAlert();
			$("#loginform").slideUp();
			$("#recoverform").fadeIn();
		})
		.catch(function (error) {
			errorFirebaseAuth(error.code);
		});
}
function phoneAuths() {
	//get the number
	var number = document.getElementById("number").value;
	// alert(number);
	//it takes two parameter first one is number and second one is recaptcha
	firebase
		.auth()
		.signInWithPhoneNumber(number, window.recaptchaVerifier)
		.then(function (confirmationResult) {
			//s is in lowercase
			window.confirmationResult = confirmationResult;
			coderesult = confirmationResult;
			console.log(coderesult);
			okAlert();
			$("#recoverform").slideUp();
			$("#recoverform2").fadeIn();
		})
		.catch(function (error) {
			errorFirebaseAuth(error.code);
		});
}
function codeverifys() {
	var code = document.getElementById("verificationCode").value;
	var phoneuser = document.getElementById("phoneUser").value;
	let btn = document.getElementById("btnV");
	btn.disabled = true;
	btn.value = "Verificando ...";

	setTimeout(function () {
		btn.disabled = false;
		btn.value = "Enviar";
	}, 10000);

	coderesult
		.confirm(code)
		.then(function (result) {
			var user = result.user;
			console.log(user);
			location.href = "https://tramites.cobiene.mil.pe/site/token/" + phoneuser;
		})
		.catch(function (error) {
			errorFirebaseAuth(error.code);
		});
}

function codeverify() {
	var code = document.getElementById("verificationCode").value;
	var phoneuser = document.getElementById("phoneUser").value;
	let btn = document.getElementById("btnV");

	coderesult
		.confirm(code)
		.then(function (result) {
			var user = result.user;
			console.log(user);
			location.href = "https://tramites.cobiene.mil.pe/site/token/" + phoneuser;
		})
		.catch(function (error) {
			errorFirebaseAuth(error.code);
		});
	
}

function errorFirebaseAuth(error) {
	switch (error) {
		case "auth/invalid-verification-code":
			Swal.fire({
				type: "error",
				title: "Código de Verifiación Incorrecto",
				text: "El código de verificación de SMS utilizado para crear la credencial de autenticación del teléfono no es válido. Vuelva a enviar el código de verificación SMS y asegúrese de usar el código de verificación proporcionado por el sistema.",
			});
			$("#recoverform").fadeIn();
			$("#recoverform2").slideUp();
			$("#btnSend").attr("disabled", true);

			break;

		case "auth/too-many-requests":
			Swal.fire({
				type: "warning",
				title: "Demasiadas Solicitudes",
				text: "El cobiene le informa que su cuenta se ha bloqueado provicionalmente por su seguridad, debido a varios intentos errados. Vuelva a intentarlo más tarde.",
			});
			$("#recoverform").fadeIn();
			$("#recoverform2").slideUp();

			break;

		case "auth/network-request-failed":
			Swal.fire({
				type: "error",
				title: "Erro de Hosting",
				text: "Esta aplicación, identificada por el dominio donde está alojada, no está autorizada para usar Firebase Authentication con la clave de API proporcionada. Revise la configuración de su clave en la consola API de Google.",
			});
			break;
		default:
			alert(error);
	}
}

function okAlert() {
	Swal.fire(
		"Codigo Enviado!",
		"En breve llegara su código de verificación",
		"success"
	);
}
