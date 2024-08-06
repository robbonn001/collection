
let addFolderForm = document.querySelector("#addFolder");
let folderInput = addFolderForm.querySelector("#folder");
let folderBtn = addFolderForm.querySelector("#folderBtn");

addFolderForm.addEventListener("submit", (evt)=>{
    evt.preventDefault();
});

folderBtn.addEventListener("click", (evt)=>{
    if (folderInput.value.length>=3){
        addFolderForm.submit();
    }
});