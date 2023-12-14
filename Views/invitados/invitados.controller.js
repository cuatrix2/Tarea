//archivo de donde llamar al procedimiento
//controlador

function init() {
  //detecta carga de la pagina
  $("#form_invitado").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
  //detecta carga de la pagina
  todos();
});

var todos = () => {
  var todos = new Invitados_Model("", "", "", "", "", "", "", "","", "todos");
  var html = todos.todos();
};

var guardaryeditar = (e) => { 
 e.preventDefault();
 var formData = new FormData($("#form_invitado")[0]);
 
 var Id=document.getElementById("Id").value
 
 if(Id>0){
  var invitados = new Invitados_Model('','','','','','','','',formData,'editar');
  invitados.editar();
 }else{
  var invitados = new Invitados_Model('','','','','','','','',formData,'insertar');
  invitados.insertar();
 }

};

var eliminar=(Id)=>{
  var eliminar = new Invitados_Model(Id, "", "", "", "", "", "", "", "eliminar");
  eliminar.eliminar();
}

var editar=(Id)=>{
  var uno = new Invitados_Model(Id, '',  '',  '',  '',  '',  '',  '', '','',"uno");
  uno.uno();
}

var algoritmo_cedula = () => {

  var cedula = $('#Cedula').val();

      if (cedula.length == 10) {
          var digito_region = cedula.substring(0, 2);
          if (digito_region >= 1 && digito_region <= 24) { // Extraigo el ultimo digito
              var ultimo_digito = cedula.substring(9, 10);
              var pares = parseInt(cedula.substring(1, 2)) + parseInt(cedula.substring(3, 4)) + parseInt(cedula.substring(5, 6)) + parseInt(cedula.substring(7, 8));
              var numero1 = cedula.substring(0, 1);
              var numero1 = (numero1 * 2);
              if (numero1 > 9) {
                  var numero1 = (numero1 - 9);
              }
              var numero3 = cedula.substring(2, 3);
              var numero3 = (numero3 * 2);
              if (numero3 > 9) {
                  var numero3 = (numero3 - 9);
              }
              var numero5 = cedula.substring(4, 5);
              var numero5 = (numero5 * 2);
              if (numero5 > 9) {
                  var numero5 = (numero5 - 9);
              }
              var numero7 = cedula.substring(6, 7);
              var numero7 = (numero7 * 2);
              if (numero7 > 9) {
                  var numero7 = (numero7 - 9);
              }
              var numero9 = cedula.substring(8, 9);
              var numero9 = (numero9 * 2);
              if (numero9 > 9) {
                  var numero9 = (numero9 - 9);
              }
              var impares = numero1 + numero3 + numero5 + numero7 + numero9;
              var suma_total = (pares + impares);
              // extraemos el primero digito
              var primer_digito_suma = String(suma_total).substring(0, 1);
              // Obtenemos la decena inmediata
              var decena = (parseInt(primer_digito_suma) + 1) * 10;
              // Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
              var digito_validador = decena - suma_total;
              // Si el digito validador es = a 10 toma el valor de 0
              if (digito_validador == 10) 
                  var digito_validador = 0;
              // Validamos que el digito validador sea igual al de la cedula
              if (digito_validador == ultimo_digito) {
                  $('#errorCedula').addClass('d-none');
                  $('button').prop('disabled', false);
              } else {
                  $('#errorCedula').removeClass('d-none');
                  $('#errorCedula').html('El número de cédula ingresado no es correcto');
                  $('button').prop('disabled', true);
              }

          } else { // imprimimos en consola si la region no pertenece
              $('#errorCedula').removeClass('d-none');
              $('#errorCedula').html('El número de cédula ingresado no es correcto');
              $('button').prop('disabled', true);
          }
    
  }

}

var cedula_repetida = () => {
  var cedula = $('#Cedula').val();
  var invitados = new Invitados_Model('',cedula,'','','','','','','cedula_repetida');
  invitados.cedula_repetida();
}
var verifica_correo = () => {
  var Correo = $('#Correo').val();
  var invitados = new Invitados_Model('','','','','',Correo,'','','verifica_correo');
  invitados.verifica_correo();
}


;init();
