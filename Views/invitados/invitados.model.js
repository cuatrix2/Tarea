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

  }
  
}
