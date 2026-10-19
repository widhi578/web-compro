const heroGallery = document.querySelector('[data-hero-gallery]');

if (heroGallery) {
	const heroSlides = [...heroGallery.querySelectorAll('[data-hero-slide]')];
	const heroDots = [...document.querySelectorAll('[data-hero-dot]')];
	const previousButton = document.querySelector('[data-hero-previous]');
	const nextButton = document.querySelector('[data-hero-next]');
	const heroSection = heroGallery.closest('.ad-hero');
	let activeSlide = 0;
	let scrollFrame = null;
	let pointerOverHero = false;
	let heroHasFocus = false;

	const updateActiveSlide = () => {
		activeSlide = Math.min(
			heroSlides.length - 1,
			Math.max(0, Math.round(heroGallery.scrollLeft / heroGallery.clientWidth))
		);

		heroSlides.forEach((slide, index) => {
			slide.setAttribute('aria-hidden', String(index !== activeSlide));
		});

		heroDots.forEach((dot, index) => {
			if (index === activeSlide) {
				dot.setAttribute('aria-current', 'true');
			} else {
				dot.removeAttribute('aria-current');
			}
		});
	};

	const showSlide = (index) => {
		const nextSlide = (index + heroSlides.length) % heroSlides.length;
		const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

		heroGallery.scrollTo({
			left: heroGallery.clientWidth * nextSlide,
			behavior: reduceMotion ? 'auto' : 'smooth',
		});
	};

	previousButton?.addEventListener('click', () => showSlide(activeSlide - 1));
	nextButton?.addEventListener('click', () => showSlide(activeSlide + 1));

	heroDots.forEach((dot, index) => {
		dot.addEventListener('click', () => showSlide(index));
	});

	heroGallery.addEventListener('scroll', () => {
		if (scrollFrame !== null) {
			return;
		}

		scrollFrame = window.requestAnimationFrame(() => {
			updateActiveSlide();
			scrollFrame = null;
		});
	});

	heroGallery.addEventListener('keydown', (event) => {
		if (event.key === 'ArrowLeft') {
			event.preventDefault();
			showSlide(activeSlide - 1);
		}

		if (event.key === 'ArrowRight') {
			event.preventDefault();
			showSlide(activeSlide + 1);
		}
	});

	if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
		heroSection?.addEventListener('pointerenter', () => {
			pointerOverHero = true;
		});
		heroSection?.addEventListener('pointerleave', () => {
			pointerOverHero = false;
		});
		heroSection?.addEventListener('focusin', () => {
			heroHasFocus = true;
		});
		heroSection?.addEventListener('focusout', (event) => {
			if (!heroSection.contains(event.relatedTarget)) {
				heroHasFocus = false;
			}
		});

		window.setInterval(() => {
			if (!pointerOverHero && !heroHasFocus && !document.hidden) {
				showSlide(activeSlide + 1);
			}
		}, 2000);
	}

	updateActiveSlide();
}