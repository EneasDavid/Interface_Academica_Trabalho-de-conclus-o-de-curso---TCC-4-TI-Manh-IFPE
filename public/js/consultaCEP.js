const cep=document.querySelector("#cep");
// Evento to get address
cep.addEventListener("keyup", (e) => {
    const inputValue = e.target.value;
  
    //   Check if we have a CEP
    if (inputValue.length === 8) {
      var numCep = $("#cep").val();
      var url = "https://viacep.com.br/ws/"+numCep+"/json";
      $.ajax({
          url: url,
          type: "get",
          dataType: "json",
          success:function(dados){
               console.log(dados);
               $("#uf").val(dados.uf);
               $("#cidade").val(dados.localidade);
               if (dados.logradouro!=''){
                $("#rua").val(dados.logradouro);
                }else{
                    $("#rua").prop('readonly', false);
                }
               if (dados.bairro!=''){
                   $("#bairro").val(dados.bairro);
               }else{
                   $("#bairro").val("centro");
               }
              
           }
        })
        }
});