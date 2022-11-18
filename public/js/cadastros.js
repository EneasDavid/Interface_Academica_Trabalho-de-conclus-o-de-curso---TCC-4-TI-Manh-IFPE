
const salvarTag=document.querySelector("[salvar]");
const salvarTagPopUp=document.querySelector("[popUp-cadastrar-tag]");

function chamaPopUp(){
  salvarTagPopUp.classList.add("aparecer");
}
function removerPopUp(){
  salvarTagPopUp.classList.remove("aparecer");
}