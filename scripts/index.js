
function newPatient(){

    let cancel = document.getElementById("cancel");
    let login = document.getElementById('login')

    login.style.height = "100%";

    cancel.addEventListener("click",()=>{
        login.style.height = "0";
    })
}

const nav = document.getElementById('nav');
const close_nav = document.getElementById('min');
const open_nav = document.getElementById('max');
//let openMenu = false;

close_nav.addEventListener('click',()=>{
        nav.style.width = 0
})

open_nav.addEventListener('click',()=>{
    nav.style.width = '250px';
})


