<?php
    require_once "../../controlador/facturaControlador.php";

    require_once "../../modelo/facturaModelo.php";

    $id=$_GET["id"];
    $factura=ControladorFactura::ctrInfoFactura($id);
?>

<form action="" id="FEditFactura">
    <div class="modal-header">
        <h4 class="modal-title">Ingreso de Factura</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

    <div class="form-group">
        <label for="exampleInputBorder">Login Factura</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="login" id="login" value="<?php echo $factura["login_factura"]; ?>" readonly>
        <input type="hidden" name="idFactura" value="<?php echo $factura["id_factura"]; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Password</label>
        <input type="password" class="form-control form-control-border"  placeholder="" name="password" id="password"  value="<?php echo $factura["password"]; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Repetir Password</label>
        <input type="password" class="form-control form-control-border"  placeholder="" name="vrPassword" id="vrPassword"  value="<?php echo $factura["password"]; ?>">
        <input type="hidden" value="<?php echo $factura["password"]; ?>" name="passActual">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Perfil</label>
        <select name="perfil" id="perfil" class="form-control">
            <option value="Administrador" <?php if($factura["perfil"]=="Administrador"):?>selected<?php endif; ?> >Administrador</option>
            <option value="Moderador" <?php if($factura["perfil"]=="Moderador"):?>selected<?php endif; ?> >Moderador</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Estado</label>

        <div class="row">
              <div class="col-sm-6">
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="estadoActivo" name="estado" <?php if($factura["estado_factura"]=="1"):?>checked<?php endif; ?> value="1">
                  <label for="estadoActivo" class="form-check-label">Activo</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="estadoInactivo" name="estado" <?php if($factura["estado_factura"]=="0"):?>checked<?php endif; ?> value="0">
                  <label for="estadoInactivo" class="form-check-label">Inactivo</label>
                </div>
              </div>
        </div>
    </div>

    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-outline-dark">Guardar</button>
    </div>
</form>

<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      editFactura()
    }
  });
  $('#FEditFactura').validate({
    rules: {
      password: {
        required: true,
        minlength: 3,
      },
      vrPassword: {
        required: true,
        minlength: 3,
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>