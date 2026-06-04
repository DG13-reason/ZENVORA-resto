/* ================= FEATHER ICON ================= */

feather.replace();

/* ================= NAVBAR ================= */

const menuToggle = document.getElementById("menuToggle");
const navLinks = document.querySelector(".nav-links");

if(menuToggle && navLinks){

    menuToggle.addEventListener("click", () => {

        navLinks.classList.toggle("active");

    });

}
/* ================= HALAMAN INDEX ================= */
/* ================= SLIDER ================= */

const track = document.querySelector('.info-track');
const slides = document.querySelectorAll('.info-banner');
const nextBtn = document.querySelector('.next');
const prevBtn = document.querySelector('.prev');
const slider = document.querySelector('.banner-slider');

if(track && slides.length > 0 && nextBtn && prevBtn && slider){

    let index = 0;
    const totalSlides = slides.length;

    /* UPDATE SLIDE */

    function updateSlide(){

        track.style.transform =
        `translateX(-${index * 100}%)`;

    }

    /* NEXT BUTTON */

    nextBtn.addEventListener('click', () => {

        index++;

        if(index >= totalSlides){

            index = 0;

        }

        updateSlide();

    });

    /* PREV BUTTON */

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

    /* STOP AUTO SLIDE */

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

}
/* ================= HALAMAN INDEX ================= */
/* ================= FILTER MENU ================= */

document.addEventListener('DOMContentLoaded', () => {

    const filterButtons =
    document.querySelectorAll('.filter-btn');

    const menuCards =
    document.querySelectorAll('.menu-card');

    filterButtons.forEach((button) => {

        button.addEventListener('click', () => {

            /* REMOVE ACTIVE */

            filterButtons.forEach((btn) => {

                btn.classList.remove('active');

            });

            /* ADD ACTIVE */

            button.classList.add('active');

            /* CATEGORY */

            const category =
            button.getAttribute('data-category');

            /* FILTER MENU */

            menuCards.forEach((card) => {

                if(card.classList.contains(category)){

                    card.style.display = 'block';

                }else{

                    card.style.display = 'none';

                }

            });

        });

    });
/* ================= HALAMAN INDEX ================= */
    /* DEFAULT MAIN MENU */

    menuCards.forEach((card) => {

        if(!card.classList.contains('main')){

            card.style.display = 'none';

        }

    });

});

const popup = document.getElementById("popup");
const openPopup = document.getElementById("openPopup");
const closePopup = document.getElementById("closePopup");

const loginForm = document.querySelector(".login-form");
const registerForm = document.querySelector(".register-form");

const showRegister = document.getElementById("showRegister");
const showLogin = document.getElementById("showLogin");

openPopup.addEventListener("click", () => {
    popup.classList.add("active");
});

closePopup.addEventListener("click", () => {
    popup.classList.remove("active");
});

showRegister.addEventListener("click", () => {
    loginForm.style.display = "none";
    registerForm.style.display = "flex";
});

showLogin.addEventListener("click", () => {
    registerForm.style.display = "none";
    loginForm.style.display = "flex";
});

function toggleText(card){
    card.classList.toggle("active");
}

/* ================= HALAMAN MENU ================= */
function filterMenu(kategori){

    let semua =
    document.querySelectorAll('.kategori');

    if(kategori === 'all'){

        semua.forEach(item=>{
            item.style.display = 'block';
        });

    }else{

        semua.forEach(item=>{

            item.style.display = 'none';

            if(item.classList.contains(kategori)){
                item.style.display = 'block';
            }

        });

    }

}
/* ================= FEATHER RELOAD ================= */

feather.replace();