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

    // Jalankan hanya jika halaman memiliki filter-btn
    if(filterButtons.length > 0){

        const menuCards =
        document.querySelectorAll('.menu-card');

        filterButtons.forEach((button) => {

            button.addEventListener('click', () => {

                filterButtons.forEach((btn) => {
                    btn.classList.remove('active');
                });

                button.classList.add('active');

                const category =
                button.getAttribute('data-category');

                menuCards.forEach((card) => {

                    if(card.classList.contains(category)){
                        card.style.display = 'block';
                    }else{
                        card.style.display = 'none';
                    }

                });

            });

        });

        // Default hanya untuk halaman index
        menuCards.forEach((card) => {

            if(!card.classList.contains('main')){
                card.style.display = 'none';
            }

        });

    }

});

/* ================= POPUP LOGIN ================= */

const popup = document.getElementById("popup");
const openPopupButtons = document.querySelectorAll(".openPopup");
const closePopup = document.getElementById("closePopup");

const loginForm = document.querySelector(".login-form");
const registerForm = document.querySelector(".register-form");

const showRegister = document.getElementById("showRegister");
const showLogin = document.getElementById("showLogin");

if(
    popup &&
    openPopupButtons.length > 0 &&
    closePopup &&
    loginForm &&
    registerForm &&
    showRegister &&
    showLogin
){

    openPopupButtons.forEach(button => {
        button.addEventListener("click", (e) => {
            e.preventDefault();
            popup.classList.add("active")
        })
    })

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

}

/* ================= CARD ABOUT ================= */

function toggleText(card){
    card.classList.toggle("active");
}

/* ================= HALAMAN MENU ================= */

function filterMenu(kategori, tombol){

    const semuaKategori =
    document.querySelectorAll('.kategori');

    const semuaTombol =
    document.querySelectorAll('.menu-kategori button');

    // Hapus active dari semua tombol
    semuaTombol.forEach(btn => {
        btn.classList.remove('active');
    });

    // Tambahkan active ke tombol yang diklik
    tombol.classList.add('active');

    if(kategori === 'all'){

        semuaKategori.forEach(item => {
            item.style.display = 'block';
        });

    }else{

        semuaKategori.forEach(item => {

            if(item.classList.contains(kategori)){
                item.style.display = 'block';
            }else{
                item.style.display = 'none';
            }

        });

    }

}

function toggleText(card){
    document.querySelectorAll('.about-card').forEach(item=>{
        if(item !== card){
            item.classList.remove('active');
        }
    });

    card.classList.toggle('active');
}

/* ================= FEATHER RELOAD ================= */
feather.replace();