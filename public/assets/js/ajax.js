// DELETAR CLIENTES
$(document).ready(function () {
  $(".deletar").click(function (e) {
    if (!confirm("Deseja Deletar este Cliente?")) {
      e.preventDefault();
    }
  });
});

$("#editar-clientes").submit(function (e) {
  e.preventDefault();

  let name = $("#nome-cliente").val();
  let email = $("#email-cliente").val();
  let numero = $("#numero-cliente").val();
  let id = e.target.getAttribute("data-id");

  if (name && email && numero) {
    $.ajax({
      url: "http://localhost/sistema_completo/public/editar-cliente",
      method: "POST",
      data: { name: name, email: email, number: numero, id: id },

      success: function (data) {
        $("#flash").show();
        $("#flash").html(data);
        setTimeout(function () {
          $("#flash").hide();
        }, 3000);
      },
    });
  }
});

$(function () {
  $("#valor").maskMoney({
    prefix: "R$ ",
    allowNegative: true,
    thousands: ".",
    decimal: ",",
    affixesStay: false,
  });
});

// DELETAR PAGAMENTOS
$(document).ready(function () {
  $(".deletar-pagamento").click(function (e) {
    if (!confirm("Deseja Deletar este Pagamento?")) {
      e.preventDefault();
    }
  });
});
