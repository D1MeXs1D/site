const hamburger = document.querySelector(".kefekty_animatsu");

window.addEventListener("scroll", () => {
	if (window.pageYOffset > 500) {
		hamburger.classList.add("active");
	} else {
		hamburger.classList.remove("active")
	}
})

let menuBtn = document.querySelector('.burgerBUTTON');
let toggler = false;
menuBtn.addEventListener('click', function(){  
	if (toggler == false) {
		document.body.style.overflow = 'hidden';
		window.scrollTo(0, 0);
		toggler = true;
	}
	else {
		document.body.style.overflow = 'visible';
		toggler = false;
	}
})