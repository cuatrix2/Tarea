class Invitados_Model {
  constructor(
    Id,
    Cedula,
    Nombres,
    Apellidos,
    Telefono,
    Edad,
    Sexo,
    Correo,
    data,
    Ruta
  ) {
    this.Id = Id;
    this.Cedula = Cedula;
    this.Nombres = Nombres;
    this.Apellidos = Apellidos;
    this.Telefono = Telefono;
    this.Edad = Edad;
    this.Sexo = Sexo;
    this.Correo = Correo;
    this.Ruta = Ruta;
    this.data = data;
  }
  todos() {
    var html = "";
    $.get(
      "../../Controllers/invitado.controller.php?op=" + this.Ruta,
      (res) => {
        res = JSON.parse(res);
        $.each(res, (index, valor) => {
          var fondo;
          if (valor.Sexo == "Masculino") fondo = "bg-primary";
          else if (valor.Sexo == "Femenino") fondo = "bg-success";
          html += `<tr>
                  <td>${index + 1}</td>
                  <td>${valor.Cedula}</td>
                  <td>${valor.Nombres}</td>
                  <td>${valor.Apellidos}</td>
                  <td>${valor.Telefono}</td>
                  <td>${valor.Edad}</td>
                  <td><div class="d-flex align-items-center gap-2">
                  <span class="badge ${fondo} rounded-3 fw-semibold">${
            valor.Sexo
          }</span>
              </div></td>
                  <td>${valor.Correo}</td>
              <td>
              <button class='btn btn-success' onclick='editar(${
                valor.Id
              })'>Editar</button>
              <button class='btn btn-danger' onclick='eliminar(${
                valor.Id
              })'>Eliminar</button>
              <button class='btn btn-info' onclick='ver(${
                valor.Id
              })'>Ver</button>
              </td></tr>
                  `;
        });
    
        $("#tabla_invitados").html(html);
      }
    );
  }
  insertar() {
    var dato = new FormData();
    dato = this.data;
    $.ajax({
      url: "../../Controllers/invitado.controller.php?op=insertar",
      type: "POST",
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res === "ok") {
          Swal.fire("invitado", "Invitado Registrado", "success");
          todos();
        } else {
          Swal.fire("Error", res, "error");
        }
      }
    });
    this.limpia_Cajas(); 
  }

  cedula_repetida(){
    var Cedula = this.Cedula;
    $.post("../../Controllers/invitado.controller.php?op=cedula_repetida", {Cedula: Cedula}, (res) => {
        res = JSON.parse(res);
        if( parseInt(res.cedula_repetida) > 0){
            $('#CedulaRepetida').removeClass('d-none');
            $('#CedulaRepetida').html('La cédua ingresa, ya exite en la base de datos');
            $('button').prop('disabled', true);
        }else{
            $('#CedulaRepetida').addClass('d-none');
            $('button').prop('disabled', false);
        }

    })
  }
  verifica_correo(){
    var Correo = this.Correo;
    $.post("../../Controllers/invitado.controller.php?op=verifica_correo", {Correo: Correo}, (res) => {
        res = JSON.parse(res);
        if( parseInt(res.cedula_repetida) > 0){
            $('#CorreoRepetido').removeClass('d-none');
            $('#CorreoRepetido').html('El correo ingresado, ya exite en la base de datos');
            $('button').prop('disabled', true);
        }else{
            $('#CorreoRepetido').addClass('d-none');
            $('button').prop('disabled', false);
        }
    })
  }

  limpia_Cajas(){
    document.getElementById("Cedula").value = "";
    document.getElementById("Nombres").value = "";  
    document.getElementById("Apellidos").value = "";
    document.getElementById("Telefono").value = "";
    document.getElementById("Edad").value = "";
    document.getElementById("Correo").value = "";
  
    $("#Modal_invitado").modal("hide");
  }
  

}
