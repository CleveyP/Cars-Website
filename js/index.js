const slides = document.querySelectorAll(".slide");

slides.forEach((slide, index) => {     
    slide.style.transform = `translateX(${index * 100}%)`;
});

const nextSlide = document.getElementById('left-chevron');

let curSlide = 0;

let maxSlide = slides.length - 1;

nextSlide.addEventListener("click", function() {
    // check if current slide is the last and rest current slide
    if (curSlide === maxSlide) {
        curSlide = 0;
    }
    else {
        curSlide++;
    }

    // move slide by -100%
    slides.forEach((slide, index) => {
        slide.style.transform = `translateX(${100 * (index - curSlide)}%)`;
    });
});

const prevSlide = document.getElementById('right-chevron');

prevSlide.addEventListener("click", function() {
    if (curSlide === 0) {
        curSlide = maxSlide;
    }
    else {
        curSlide--;
    }

    slides.forEach((slide, index) => {
        slide.style.transform = `translateX(${100 * (index - curSlide)}%)`;
    });
});