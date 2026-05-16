/* ================= FEATHER ICON ================= */

feather.replace();

/*================== NAVBAR ===================*/
const menuToggle = document.getElementById("menuToggle");
const navLinks = document.querySelector(".nav-links");

menuToggle.addEventListener("click", () => {
    navLinks.classList.toggle("active");
});

feather.replace();

/* ================= SLIDER ================= */

const track = document.querySelector('.info-track');

const slides = document.querySelectorAll('.info-banner');

const nextBtn = document.querySelector('.next');

const prevBtn = document.querySelector('.prev');

let index = 0;

const totalSlides = slides.length;

/* UPDATE */

function updateSlide(){

    track.style.transform =
    `translateX(-${index * 100}%)`;

}

/* NEXT */

nextBtn.addEventListener('click', () => {

    index++;

    if(index >= totalSlides){
        index = 0;
    }

    updateSlide();

});

/* PREV */

prevBtn.addEventListener('click', () => {

    index--;

    if(index < 0){
        index = totalSlides - 1;
    }

    updateSlide();

});

/* AUTO SLIDE */

let autoSlide = setInterval(() => {

    index++;

    if(index >= totalSlides){
        index = 0;
    }

    updateSlide();

}, 3000);

/* STOP HOVER */

const slider = document.querySelector('.banner-slider');

slider.addEventListener('mouseenter', () => {

    clearInterval(autoSlide);

});

/* PLAY AGAIN */

slider.addEventListener('mouseleave', () => {

    autoSlide = setInterval(() => {

        index++;

        if(index >= totalSlides){
            index = 0;
        }

        updateSlide();

    }, 3000);

});