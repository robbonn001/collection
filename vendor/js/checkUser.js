

let form = document.querySelector("form");
let registerBtn = form.querySelector("#registerBtn");
let loginBtn = form.querySelector("#loginBtn");

let loginInput = form.querySelector("#loginInput");
let passInput = form.querySelector("#passInput");

let passLen = 8;
let loginLen = 3;

form.addEventListener("submit", (evt)=>{
    evt.preventDefault();
});

registerBtn.addEventListener("click", (evt)=>{
    if (!checkValid()){
        return
    }
    send("?route=main/register");
});

loginBtn.addEventListener("click", (evt)=>{
    if (!checkValid()){
        return
    }
    send("?route=main/login");
});

function checkValid(){
    return (passInput.value.length>=passLen && loginInput.value.length>=loginLen);
}
function send(path){
    form['action'] = path;
    form.submit();
}