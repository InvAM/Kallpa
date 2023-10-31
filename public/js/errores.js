// Espera a que el documento esté completamente cargado
document.addEventListener("DOMContentLoaded", function () {
	// Crea las líneas de tiempo de GSAP
	let t1 = gsap.timeline();
	let t2 = gsap.timeline();
	let t3 = gsap.timeline();

	// Animación para ".cog1"
	t1.to(".cog1", {
		transformOrigin: "50% 50%",
		rotation: "+=360",
		repeat: -1,
		ease: Linear.easeNone,
		duration: 8,
	});

	// Animación para ".cog2"
	t2.to(".cog2", {
		transformOrigin: "50% 50%",
		rotation: "-=360",
		repeat: -1,
		ease: Linear.easeNone,
		duration: 8,
	});

	// Animación para ".wrong-para"
	t3.fromTo(
		".wrong-para",
		{
			opacity: 0,
		},
		{
			opacity: 1,
			duration: 1,
			stagger: {
				repeat: -1,
				yoyo: true,
			},
		}
	);
});
