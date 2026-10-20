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
		}, 5000);
	}

	updateActiveSlide();
}

const tripGallery = document.querySelector('[data-trip-gallery]');

if (tripGallery) {
	const tripSlides = [...tripGallery.querySelectorAll('[data-trip-slide]')];
	const previousButton = document.querySelector('[data-trip-previous]');
	const nextButton = document.querySelector('[data-trip-next]');
	const status = document.querySelector('[data-trip-status]');
	const carousel = tripGallery.closest('.ad-work__carousel');
	let activeSlide = 0;
	let scrollFrame = null;
	let pointerOverGallery = false;
	let galleryHasFocus = false;

	const getSlideOffset = (slide) => {
		const galleryBounds = tripGallery.getBoundingClientRect();
		const slideBounds = slide.getBoundingClientRect();

		return tripGallery.scrollLeft + slideBounds.left - galleryBounds.left;
	};

	const updateActiveSlide = () => {
		const galleryLeft = tripGallery.getBoundingClientRect().left;
		let nearestSlide = 0;
		let nearestDistance = Number.POSITIVE_INFINITY;

		tripSlides.forEach((slide, index) => {
			const distance = Math.abs(slide.getBoundingClientRect().left - galleryLeft);

			if (distance < nearestDistance) {
				nearestSlide = index;
				nearestDistance = distance;
			}
		});

		activeSlide = nearestSlide;

		tripSlides.forEach((slide, index) => {
			slide.setAttribute('aria-current', String(index === activeSlide));
		});

		if (status) {
			status.textContent = `${String(activeSlide + 1).padStart(2, '0')} / ${String(tripSlides.length).padStart(2, '0')}`;
		}
	};

	const showSlide = (index) => {
		const nextSlide = (index + tripSlides.length) % tripSlides.length;
		const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
		const isWrapping = index < 0 || index >= tripSlides.length;

		if (isWrapping) {
			tripGallery.style.scrollBehavior = 'auto';
			tripGallery.scrollLeft = getSlideOffset(tripSlides[nextSlide]);
			window.requestAnimationFrame(() => {
				tripGallery.style.removeProperty('scroll-behavior');
			});
			return;
		}

		tripGallery.scrollTo({
			left: getSlideOffset(tripSlides[nextSlide]),
			behavior: reduceMotion ? 'auto' : 'smooth',
		});
	};

	previousButton?.addEventListener('click', () => showSlide(activeSlide - 1));
	nextButton?.addEventListener('click', () => showSlide(activeSlide + 1));

	tripGallery.addEventListener('scroll', () => {
		if (scrollFrame !== null) {
			return;
		}

		scrollFrame = window.requestAnimationFrame(() => {
			updateActiveSlide();
			scrollFrame = null;
		});
	});

	tripGallery.addEventListener('keydown', (event) => {
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
		carousel?.addEventListener('pointerenter', () => {
			pointerOverGallery = true;
		});
		carousel?.addEventListener('pointerleave', () => {
			pointerOverGallery = false;
		});
		carousel?.addEventListener('focusin', () => {
			galleryHasFocus = true;
		});
		carousel?.addEventListener('focusout', (event) => {
			if (!carousel.contains(event.relatedTarget)) {
				galleryHasFocus = false;
			}
		});

		window.setInterval(() => {
			if (!pointerOverGallery && !galleryHasFocus && !document.hidden) {
				showSlide(activeSlide + 1);
			}
		}, 5000);
	}

	updateActiveSlide();
}

const servicesMenu = document.querySelector('.site-nav__item--services');
const siteNavigation = document.querySelector('.site-nav');

if (siteNavigation) {
	const navigationToggle = siteNavigation.querySelector('.site-nav__toggle');
	const navigationLinks = siteNavigation.querySelector('.site-nav__links');

	const setNavigationOpen = (isOpen) => {
		siteNavigation.classList.toggle('is-menu-open', isOpen);
		navigationToggle.setAttribute('aria-expanded', String(isOpen));
		navigationToggle.setAttribute('aria-label', isOpen ? 'Tutup menu navigasi' : 'Buka menu navigasi');

		if (!isOpen && servicesMenu) {
			servicesMenu.classList.remove('is-open');
			servicesMenu.querySelector('.site-nav__submenu-toggle').setAttribute('aria-expanded', 'false');
		}
	};

	navigationToggle.addEventListener('click', () => {
		setNavigationOpen(!siteNavigation.classList.contains('is-menu-open'));
	});

	navigationLinks.addEventListener('click', (event) => {
		if (event.target.closest('a')) {
			setNavigationOpen(false);
		}
	});

	document.addEventListener('click', (event) => {
		if (!siteNavigation.contains(event.target)) {
			setNavigationOpen(false);
		}
	});

	document.addEventListener('keydown', (event) => {
		if (event.key === 'Escape' && siteNavigation.classList.contains('is-menu-open')) {
			setNavigationOpen(false);
			navigationToggle.focus();
		}
	});
}

if (servicesMenu) {
	const servicesToggle = servicesMenu.querySelector('.site-nav__submenu-toggle');
	const servicesSubmenu = servicesMenu.querySelector('.site-nav__submenu');

	const setServicesMenuOpen = (isOpen) => {
		servicesMenu.classList.toggle('is-open', isOpen);
		servicesToggle.setAttribute('aria-expanded', String(isOpen));
	};

	servicesToggle.addEventListener('click', () => {
		setServicesMenuOpen(!servicesMenu.classList.contains('is-open'));
	});

	servicesSubmenu.addEventListener('click', (event) => {
		if (event.target.closest('a')) {
			setServicesMenuOpen(false);
		}
	});

	document.addEventListener('click', (event) => {
		if (!servicesMenu.contains(event.target)) {
			setServicesMenuOpen(false);
		}
	});

	document.addEventListener('keydown', (event) => {
		if (event.key === 'Escape' && servicesMenu.classList.contains('is-open')) {
			setServicesMenuOpen(false);
			servicesToggle.focus();
		}
	});
}