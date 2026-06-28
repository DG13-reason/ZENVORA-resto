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

/*===============HALAMAN PAYMENTS==================*/
function showForm(type){

    document
    .getElementById("resto")
    .classList
    .remove("active");

    document
    .getElementById("delivery")
    .classList
    .remove("active");

    document
    .getElementById(type)
    .classList
    .add("active");
}

/*================NOMOR MEJA=================*/
const area = document.getElementById("area");

if(area){

    area.addEventListener("change", function (){

        fetch("get_meja.php?area=" + encodeURIComponent(this.value))
        .then(response => response.text())
        .then(data => {
            document.getElementById("meja").innerHTML = data;
        })
        .catch(error => console.error(error));

    });

}

/*=================== PEMBAYARAN RESTORAN ===================*/
function tampilPembayaranResto(){

    const metode = document.querySelector('input[name="payment_method"]:checked').value;

    document.getElementById("tunai").style.display = "none";
    document.getElementById("transfer").style.display = "none";
    document.getElementById("ewallet").style.display = "none";
    document.getElementById("qris").style.display = "none";

    document.getElementById("uploadSection").style.display = "none";
    document.getElementById("proof_image").required = false;

    if(metode == "Tunai"){
        document.getElementById("tunai").style.display = "block";
    }
    if(metode == "Transfer"){
        document.getElementById("transfer").style.display = "block";
        document.getElementById("uploadSection").style.display = "block";
        document.getElementById("proof_image").required = true;
    }
    if(metode == "E-Wallet"){
        document.getElementById("ewallet").style.display = "block";
        document.getElementById("uploadSection").style.display = "block";
        document.getElementById("proof_image").required = true;
    }
    if(metode == "QRIS"){
        document.getElementById("qris").style.display = "block";
        document.getElementById("uploadSection").style.display = "block";
        document.getElementById("proof_image").required = true;
    }
}

document.querySelectorAll('input[name="payment_method"]').forEach(function(radio){
    radio.addEventListener("change", tampilPembayaranResto);
});

tampilPembayaranResto();



/*=================== PEMBAYARAN DELIVERY ===================*/
function tampilPembayaranDelivery(){

    const metode = document.querySelector('input[name="pay2"]:checked').value;

    document.getElementById("cod").style.display = "none";
    document.getElementById("transfer2").style.display = "none";
    document.getElementById("ewallet2").style.display = "none";
    document.getElementById("qris2").style.display = "none";

    document.getElementById("uploadDelivery").style.display = "none";
    document.getElementById("proof_image_delivery").required = false;

    if(metode == "COD"){
        document.getElementById("cod").style.display = "block";
    }
    if(metode == "Transfer"){
        document.getElementById("transfer2").style.display = "block";
        document.getElementById("uploadDelivery").style.display = "block";
        document.getElementById("proof_image_delivery").required = true;
    }
    if(metode == "E-Wallet"){
        document.getElementById("ewallet2").style.display = "block";
        document.getElementById("uploadDelivery").style.display = "block";
        document.getElementById("proof_image_delivery").required = true;
    }
    if(metode == "QRIS"){
        document.getElementById("qris2").style.display = "block";
        document.getElementById("uploadDelivery").style.display = "block";
        document.getElementById("proof_image_delivery").required = true;
    }
}

document.querySelectorAll('input[name="pay2"]').forEach(function(radio){
    radio.addEventListener("change", tampilPembayaranDelivery);
});

tampilPembayaranDelivery();
/* ================= FEATHER RELOAD ================= */
feather.replace();