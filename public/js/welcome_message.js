searchForm = document.querySelector('search-form');
document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
}

let loginForm = document.querySelector('#login-form');
let registerForm = document.querySelector('#register-form');
let formContainer = document.querySelector('.form-container');

document.querySelector('#login-btn').onclick = () => {
    formContainer.classList.add('active');
    loginForm.classList.add('active');
    registerForm.classList.remove('active');
};

document.querySelector('#close-login-btn').onclick = () => {
    formContainer.classList.remove('active');
};

document.querySelector('#close-register-btn').onclick = () => {
    formContainer.classList.remove('active');
};

document.querySelector('#show-register').onclick = (e) => {
    e.preventDefault();
    loginForm.classList.remove('active');
    registerForm.classList.add('active');
};

document.querySelector('#show-login').onclick = (e) => {
    e.preventDefault();
    registerForm.classList.remove('active');
    loginForm.classList.add('active');
};


window.onscroll = () =>{

    searchForm.classList.remove('active');

    if(window.scrollY > 80){
        document.querySelector(".header .header-2").classList.add('active');
    }else{
        document.querySelector(".header .header-2").classList.remove('active');
    }
}

window.onload = () =>{

    if(window.scrollY > 80){
        document.querySelector(".header .header-2").classList.add('active');
    }else{
        document.querySelector(".header .header-2").classList.remove('active');
    }
}

var swiper = new Swiper(".books-slider", {
   loop:true,
  centeredSlides: true,
  autoplay:{
    delay: 1000,
    disableOnInteraction: false,
  },
    breakpoints: {
      0: {
        slidesPerView: 1,
      
      },
      768: {
        slidesPerView: 2,
      
      },
      1024: {
        slidesPerView: 3,
    
      },
    },
  });


  var swiper = new Swiper(".featured-slider", {
    spaceBetween: 10,
    loop:true,
   centeredSlides: true,
   autoplay:{
     delay: 1000,
     disableOnInteraction: false,
   },
   navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
     breakpoints: {
       0: {
         slidesPerView: 1,
       
       },
       450: {
        slidesPerView: 2,
      
      },
       768: {
         slidesPerView: 3,
       
       },
       1024: {
         slidesPerView: 4,
     
       },
     },
   });

   var swiper = new Swiper(".arrivals-slider", {
    spaceBetween: 10,
    loop:true,
   centeredSlides: true,
   autoplay:{
     delay: 1000,
     disableOnInteraction: false,
   },
  
     breakpoints: {
       0: {
         slidesPerView: 1,
       
       },
       
       768: {
         slidesPerView: 2,
       
       },
       1024: {
         slidesPerView: 3,
     
       },
     },
   });




   