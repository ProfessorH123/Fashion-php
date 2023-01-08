/*HEADER*/
window.addEventListener('scroll',()=>{
    document.querySelector('.container').classList.toggle('sticky',window.scrollY>0);
})

/*THEME*/
document.querySelector('#theme').addEventListener("click",()=>{
    document.querySelector('#theme').classList.toggle("fa-sun");

    if(document.querySelector('#theme').classList.contains('fa-sun')){
        document.querySelector('body').classList.add('black');
    }else{
        document.querySelector('body').classList.remove('black');
    }
})

/*NAVBAR*/
document.querySelector('#bars').addEventListener('click',()=>{
    document.querySelector('.navbar').classList.toggle('active');
})

document.querySelector('#close').addEventListener('click',()=>{
    document.querySelector('.navbar').classList.remove('active');
})

/*CONTACT*/
document.querySelector('.info_btn').addEventListener('click',()=>{
    document.querySelector('.contact_form').classList.add('none');
    document.querySelector('.info_form').classList.remove('none');
    document.querySelector('.info_btn').classList.add('active');
    document.querySelector('.contact_btn').classList.remove('active');
})

document.querySelector('.contact_btn').addEventListener('click',()=>{
    document.querySelector('.contact_form').classList.remove('none');
    document.querySelector('.info_form').classList.add('none');
    document.querySelector('.contact_btn').classList.add('active');
    document.querySelector('.info_btn').classList.remove('active');
})

document.querySelector('.adresse').addEventListener('click',()=>{
    document.querySelector('.adresse').classList.add('active');
    document.querySelector('.telephone').classList.remove('active');
    document.querySelector('.partners').classList.remove('active');

    document.querySelector('.popup-1').classList.remove('none');
    document.querySelector('.popup-2').classList.add('none');
    document.querySelector('.popup-3').classList.add('none');
})

document.querySelector('.telephone').addEventListener('click',()=>{
    document.querySelector('.telephone').classList.add('active');
    document.querySelector('.adresse').classList.remove('active');
    document.querySelector('.partners').classList.remove('active');

    document.querySelector('.popup-2').classList.remove('none');
    document.querySelector('.popup-1').classList.add('none');
    document.querySelector('.popup-3').classList.add('none');
})

document.querySelector('.partners').addEventListener('click',()=>{
    document.querySelector('.partners').classList.add('active');
    document.querySelector('.adresse').classList.remove('active');
    document.querySelector('.telephone').classList.remove('active');

    document.querySelector('.popup-3').classList.remove('none');
    document.querySelector('.popup-1').classList.add('none');
    document.querySelector('.popup-2').classList.add('none');
})

/*SWIPER SLIDER*/
var swiper = new Swiper(".mySwiper", {
    effect: "cube",
    grabCursor: true,
    cubeEffect: {
      shadow: true,
      slideShadows: true,
      shadowOffset: 20,
      shadowScale: 0.94,
    },
    pagination: {
      el: ".swiper-pagination",
    },
});


/*LOGIN FORM*/
let registerBtn = document.querySelector('.account-form .register-btn');
let loginBtn = document.querySelector('.account-form .login-btn');

registerBtn.onclick = () =>{
  registerBtn.classList.add('active');
  loginBtn.classList.remove('active');
  document.querySelector('.account-form .login-form').classList.remove('active');
  document.querySelector('.account-form .register-form').classList.add('active');
};

loginBtn.onclick = () =>{
  registerBtn.classList.remove('active');
  loginBtn.classList.add('active');
  document.querySelector('.account-form .login-form').classList.add('active');
  document.querySelector('.account-form .register-form').classList.remove('active');
};

let accountForm = document.querySelector('.account-form')

document.querySelector('#account-btn').onclick = () =>{
  accountForm.classList.add('active');
}

document.querySelector('#close-form').onclick = () =>{
  accountForm.classList.remove('active');
};