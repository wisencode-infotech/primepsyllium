// Enable tooltips 
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

// wow animation setting 
new WOW().init();

// mobile device in zoom-out and zoom-in disable 
	document.addEventListener('gesturestart', function (e) {
		e.preventDefault();
	});
	document.addEventListener('wheel', function (e) {
		if (e.ctrlKey) {
				e.preventDefault();
		}
	}, { passive: false });

// brand logo slider 
$('.coverage-sliders').slick({
  dots: false,
  arrows: false,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 2000,
  speed: 300,
  slidesToShow: 7,
  slidesToScroll: 7,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 5,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    }
  ]
});

// products slider 
$('.prime-product-slider').slick({
  dots: false,
  arrows: true,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 2000,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1,
		arrows: false,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
		arrows: false,
      }
    },
    {
      breakpoint: 480,
      settings: {
		centerMode: true,
  		centerPadding: '60px',
        slidesToShow: 1,
        slidesToScroll: 1,
		arrows: false,
      }
    }
  ]
});
