$("#cep").on("change", function(){
    const cep = $(this).val();
    console.log(cep);
    $.ajax({
      type: 'GET',
      url: 'https://viacep.com.br/ws/' + cep + '/json/',
      dataType: "json",
      success: function (retorno) {
          if (!retorno.success){
              showSwal("flash-error", 'Erro ao alterar forma de pagamento.');
          } else {
            showSwal("flash-success", 'Forma de pagamento alterada!');

          }
      }, 
    })
  })