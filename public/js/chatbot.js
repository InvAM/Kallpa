let nombreIngresado = "";
let esperandoRespuesta = false;
let problemasServicio = false;

function abrirChat() {
	document.getElementById("chatBox").style.display = "block";
	saludar();
}

function saludar() {
	mostrarMensaje("¡Hola! ¿Cómo te llamas?", "bot");
}

function mostrarMensaje(message, sender) {
	let chatContainer = document.getElementById("chat-container");
	const lado = sender === "bot" ? "left" : "right";
	chatContainer.innerHTML += `<div class="message ${lado}">${message}</div>`;
	chatContainer.scrollTop = chatContainer.scrollHeight;
}

function enviarMensaje() {
	let mensaje = document.getElementById("inputMessage").value;
	if (!esperandoRespuesta) {
		nombreIngresado = mensaje;
		mostrarMensaje(nombreIngresado, "user");
		mostrarMensaje(
			`¡Hola, ${nombreIngresado}! ¿En qué puedo ayudarte hoy?`,
			"bot"
		);
		mostrarOpciones();
		document.getElementById("inputMessage").value = "";
	} else {
		mostrarMensaje(mensaje, "user");
		if (problemasServicio) {
			mostrarMensaje(
				`Lamento mucho escuchar sobre tu problema: "${mensaje}"`,
				"bot"
			);
			mostrarMensaje(
				"¿Deseas realizar un reclamo referente a tu servicio?",
				"bot"
			);
			mostrarMensaje(
				'<button id="reclamoSiBtn" class="chatbtn" onclick="reclamoSi()">Sí</button><button id="reclamoNoBtn" class="chatbtn" onclick="reclamoNo()">No</button>',
				"bot"
			);
			problemasServicio = false;
		} else {
			procesarRespuesta(mensaje);
		}
		esperandoRespuesta = false;
		document.getElementById("inputMessage").value = "";
	}
}

function mostrarOpciones() {
	mostrarMensaje(
		'<button id="problemasBtn" class="btn" onclick="seleccionarOpcion(\'Servicio\')">Problemas con mi servicio</button>' +
			'<button id="electrodomesticoBtn" class="btn" onclick="seleccionarOpcion(\'Electrodomestico\')">Quiero adquirir un electrodoméstico</button>' +
			'<button id="quienesBtn" class="btn" onclick="seleccionarOpcion(\'¿Quiénes son?\')">¿Quiénes son ustedes?</button>',
		"bot"
	);
}

function seleccionarOpcion(opcion) {
	mostrarMensaje(opcion, "user");
	if (opcion === "Servicio") {
		mostrarMensaje("¿En qué consisten tus problemas con el servicio?", "bot");
		problemasServicio = true;
		esperandoRespuesta = true;
	} else if (opcion === "Electrodomestico") {
		mostrarMensaje(
			"Adquiere tu electrodoméstico con Kallpa y financia fácilmente en tus recibos de gas natural. Tecnología para tu hogar, sin complicaciones financieras.",
			"bot"
		);
		mostrarMensaje("¿Deseas ver nuestro catálogo de productos?", "bot");
		mostrarMensaje(
			'<button class="chatbtn" id="adquirirElectoBtn" onclick="AdquirirElecto()">Sí</button><button id="reiniciarBtn" class="chatbtn" onclick="reiniciar()">No</button>',
			"bot"
		);
	} else if (opcion === "¿Quiénes son?") {
		mostrarMensaje(
			"Hola nosotros somos Kallpa Contratistas y Suministros una empresa joven con un equipo altamente calificado. Estamos aquí para cubrir las necesidades de nuestros clientes, cumpliendo con altos estándares de calidad, seguridad y respeto al gas natural",
			"bot"
		);
		mostrarMensaje("¿Deseas conocer más de nosotros?", "bot");
		mostrarMensaje(
			'<button class="chatbtn" id="QuinessomosSi" onclick="QuinessomosSi()">Sí</button><button id="QuienessomosNo" class="chatbtn" onclick="QuienessomosNo()">No</button>',
			"bot"
		);
	} else {
		procesarRespuesta(opcion);
	}
}

function AdquirirElecto() {
	// Redireccionar al formulario para reclamo
	window.location.href = "catalogo";
	limpiarChat();
	cerrarChat();
}

function reclamoSi() {
	// Redireccionar al formulario para reclamo
	window.location.href = "reclamaciones";
	limpiarChat();
	cerrarChat();
}
function QuinessomosSi() {
	// Redireccionar al formulario para reclamo
	window.location.href = "infoKallpa";
	limpiarChat();
	cerrarChat();
}

function limpiarChat() {
	document.getElementById("chat-container").innerHTML = ""; // Limpiar el contenido del chat
}

function reclamoNo() {
	mostrarMensaje(
		"Entiendo que actualmente no estás buscando presentar un reclamo, sin embargo, igualmente te proporciono el número de atención al cliente en caso de que surja algún problema: 123-456-789",
		"bot"
	);
	mostrarMensaje("¿Puedo ayudarte en algo más?", "bot");
	mostrarMensaje(
		'<button id="reiniciarChatBtn" class="chatbtn" onclick="reiniciarChat()">Sí</button><button id="cerrarChatBtn" class="chatbtn" onclick="cerrarChat()">No</button>',
		"bot"
	);
}

function procesarRespuesta(respuesta) {
	mostrarMensaje(`Entendido: "${respuesta}".`, "bot");
	mostrarMensaje("¿Puedo ayudarte en algo más?", "bot");
	mostrarMensaje(
		'<button class="chatbtn" id="ayudaAdicionalSiBtn" onclick="ayudaAdicionalSi()">Sí</button><button id="reiniciarBtn" class="chatbtn" onclick="reiniciar()">No</button>',
		"bot"
	);
}

function reiniciarChat() {
	mostrarMensaje("Sí, quiero que me ayudes.", "user");
	mostrarMensaje("Claro, ¿en qué más puedo ayudarte?", "bot");
	mostrarOpciones();
}

function reiniciar() {
	mostrarMensaje("No, ver su catálogo por el momento.", "user");
	mostrarMensaje(
		"Veo que ahora mismo puede que no tengas ganas de echar un vistazo a nuestro catálogo de productos. Para más detalles sobre nuestros productos, llama al 955356191. Estamos aquí cuando decidas explorar. ¡Hasta pronto!",
		"bot"
	);
	mostrarMensaje("¿Puedo ayudarte en algo más?", "bot");
	mostrarMensaje(
		'<button id="reiniciarChatBtn" class="chatbtn" onclick="reiniciarChat()">Sí</button><button id="cerrarChatBtn" class="chatbtn" onclick="cerrarChat()">No</button>',
		"bot"
	);
}
function QuienessomosNo() {
	mostrarMensaje(
		"No, por el momento no quiero conocer más de ustedes.",
		"user"
	);
	mostrarMensaje(
		"Veo que que en estos momentos no quiero conocer más de nosotros, de igual fomar puede conocer más de nosotros en nuesro portal web. ¡Hasta pronto!",
		"bot"
	);
	mostrarMensaje("¿Puedo ayudarte en algo más?", "bot");
	mostrarMensaje(
		'<button id="reiniciarChatBtn" class="chatbtn" onclick="reiniciarChat()">Sí</button><button id="cerrarChatBtn" class="chatbtn" onclick="cerrarChat()">No</button>',
		"bot"
	);
}
function cerrarChat() {
	let chatContainer = document.getElementById("chat-container");
	chatContainer.innerHTML = ""; // Limpiar el contenido del chat
	document.getElementById("chatBox").style.display = "none";
}
