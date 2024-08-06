

let form = document.querySelector("form");
let registerBtn = form.querySelector("#registerBtn");
let loginBtn = form.querySelector("#loginBtn");

let loginInput = form.querySelector("#loginInput");
let passInput = form.querySelector("#passInput");

form.addEventListener("submit", (evt)=>{
    evt.preventDefault();
});
function checkValid(){
    return (passInput.value.length>=8 && loginInput.value.length>=4);
}
registerBtn.addEventListener("click", (evt)=>{
    if (!checkValid()){
        return
    }
    form['action'] = "?route=main/register";
    form.submit();
});

loginBtn.addEventListener("click", (evt)=>{
    if (!checkValid()){
        return
    }
    form['action'] = "?route=main/login";
    form.submit();
});