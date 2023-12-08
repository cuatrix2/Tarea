<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de invitados</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_invitado">
                        Nuevo Invitado
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Cedula</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombres</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Apellidos</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Telefono</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Edad</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Sexo</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Correo</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_invitados">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal-->
<!-- Modal -->
<div class="modal fade" id="Modal_invitado" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <form method="post" id="form_invitado">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Invitados</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" id="Id" name="Id">
                    <div class="form-group">
                        <label for="Cédula">Cédula </label>
                        <input type="text" onfocusout="algoritmo_cedula();cedula_repetida();" required class="form-control" id="Cedula" name="Cedula" placeholder="Cédula">
                        <div class="alert alert-danger d-none" role="alert" id="errorCedula">
                        </div>
                        <div class="alert alert-danger d-none" role="alert" id="CedulaRepetida">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Nombres </label>
                        <input type="text" class="form-control" id="Nombres" name="Nombres" placeholder="Nombres" required>
                    </div>
                    <div class="form-group">
                        <label for="Apellidos">Apellidos </label>
                        <input type="text" class="form-control" id="Apellidos" name="Apellidos" placeholder="Apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="Telefono">Telefono </label>
                        <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="Edad">Edad </label>
                        <input type="text" class="form-control" id="Edad" name="Edad" placeholder="Edad" required>
                    </div>
                    <div class="form-group">
                        <label for="Sexo">Sexo</label>
                        <select name="Sexo" id="Sexo" class="form-control">
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Correo">Correo </label>
                        <input type="text" required onfocusout="verifica_correo()" class="form-control" id="Correo" name="Correo" placeholder="Correo">
                        <div class="alert alert-danger d-none" role="alert" id="CorreoRepetido">
                        </div>
                    </div>
           <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
           </div>
                </form>
        
    </div>
</div>
</div>

<?php require_once('../html/script2.php') ?>

<script src="invitados.controller.js"></script>
<script src="invitados.model.js"></script>