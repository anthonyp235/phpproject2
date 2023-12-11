document.getElementById("btn_signup").addEventListener("click", signup);
document.getElementById("btn_login").addEventListener("click", login);
window.addEventListener("resize", window_resize);

//Here we declare some variables
var container__login_signup = document.querySelector(".container_login_signup");
var form_login = document.querySelector(".formulario_login");
var form_signup = document.querySelector(".formulario_signup");
var caja__trasera_login = document.querySelector(".caja_trasera_login");
var caja__trasera_signup = document.querySelector(".caja_trasera_signup");

function window_resize(){
    if(window.innerWidth > 850){
        caja__trasera_login.style.display = "block";
        caja__trasera_signup.style.display = "block";
    }else{
        caja__trasera_signup.style.display = "block";
        caja__trasera_signup.style.opacity = "1";
        caja__trasera_login.style.display = "none";
        form_login.style.display = "block";
        form_signup.style.display = "none";
        container__login_signup.style.left = "0px";
    }
}
window_resize();
function login(){

    if(window.innerWidth > 850){
        form_signup.style.display = "none";
        container__login_signup.style.left = "10px";
        form_login.style.display = "block";
        caja__trasera_signup.style.opacity = "1";
        caja__trasera_login.style.opacity = "0";
    } else{
        form_signup.style.display = "none";
        container__login_signup.style.left = "0px";
        form_login.style.display = "block";
        caja__trasera_signup.style.display = "block";
        caja__trasera_login.style.display = "none";
    }
}

function signup(){
    if(window.innerWidth > 850){
        form_signup.style.display = "block";
        container__login_signup.style.left = "410px";
        form_login.style.display = "none";
        caja__trasera_signup.style.opacity = "0";
        caja__trasera_login.style.opacity = "1";
    }else {
        form_signup.style.display = "block";
        container__login_signup.style.left = "0px";
        form_login.style.display = "none";
        caja__trasera_signup.style.display = "none";
        caja__trasera_login.style.display = "block";
        caja__trasera_login.style.opacity = "1";
    }


}