
let uploadImageForm = document.querySelector("#uploadImage");
let imageInput = uploadImageForm.querySelector("#image");
let uploadBtn = uploadImageForm.querySelector("#uploadBtn");

let uploadFlag = false;

uploadImageForm.addEventListener("submit", (evt)=>{
    evt.preventDefault();
});

imageInput.addEventListener("change", function(){
    if (this.value){
        uploadFlag = true;
    }
    uploadFlag = false;
});

uploadBtn.addEventListener("click", (evt)=>{
    if (uploadFlag){
        uploadImageForm.submit();
    }
});