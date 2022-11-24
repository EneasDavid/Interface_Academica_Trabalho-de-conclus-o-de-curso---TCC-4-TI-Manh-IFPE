
const salvarTag=document.querySelector("[salvar]");
const tabelaSelect = document.querySelectorAll('#td')[3];
const salvarTagPopUp=document.querySelector("[popUp-cadastrar-tag]");

function chamaPopUp(){
  salvarTagPopUp.classList.add("aparecer");
}
function removerPopUp(){
  salvarTagPopUp.classList.remove("aparecer");
}