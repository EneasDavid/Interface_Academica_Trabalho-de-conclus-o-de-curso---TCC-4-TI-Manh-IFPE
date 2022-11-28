const tabelaDia = document.querySelectorAll('table');
var now = new Date;
var dia=now.getDay();
var contador=0;
for (const diaTabela of tabelaDia) {
    if(contador===(dia) && contador!=0){
        diaTabela.classList.add('table');
        break;
    }
    contador++; 
}
  