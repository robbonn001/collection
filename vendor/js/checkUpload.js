
let form = document.querySelector("form");
let imageInput = form.querySelector("#image");
let uploadBtn = form.querySelector("#uploadBtn");

let uploadFlag = false;

form.addEventListener("submit", (evt)=>{
    evt.preventDefault();
});

imageInput.addEventListener("change", function(){
    if (this.value){
        uploadFlag = true;
    }
    else{
        uploadFlag = false;
    }
});

uploadBtn.addEventListener("click", (evt)=>{
    if (uploadFlag){
        form.submit();
    }
});