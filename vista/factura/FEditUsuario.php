<?php
    require_once "../../controlador/usuarioControlador.php";

    require_once "../../modelo/usuarioModelo.php";

    $id=$_GET["id"];
    $usuario=ControladorUsuario::ctrInfoUsuario($id);
?>

<form action="" id="FEditUsuario">
    <div class="modal-header">
        <h4 class="modal-title">Ingreso de Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

    <div class="form-group">
        <label for="exampleInputBorder">Login Usuario</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="login" id="login" value="<?php echo $usuario["login_usuario"]; ?>" readonly>
        <input type="hidden" name="idUsuario" value="<?php echo $usuario["id_usuario"]; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Password</label>
        <input type="password" class="form-control form-control-border"  placeholder="" name="password" id="password"  value="<?php echo $usuario["password"]; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Repetir Password</label>
        <input type="password" class="form-control form-control-border"  placeholder="" name="vrPassword" id="vrPassword"  value="<?php echo $usuario["password"]; ?>">
        <input type="hidden" value="<?php echo $usuario["password"]; ?>" name="passActual">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Perfil</label>
        <select name="perfil" id="perfil" class="form-control">
            <option value="Administrador" <?php if($usuario["perfil"]=="Administrador"):?>selected<?php endif; ?> >Administrador</option>
            <option value="Moderador" <?php if($usuario["perfil"]=="Moderador"):?>selected<?php endif; ?> >Moderador</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Estado</label>

        <div class="row">
              <div class="col-sm-6">
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="estadoActivo" name="estado" <?php if($usuario["estado_usuario"]=="1"):?>checked<?php endif; ?> value="1">
                  <label for="estadoActivo" class="form-check-label">Activo</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="estadoInactivo" name="estado" <?php if($usuario["estado_usuario"]=="0"):?>checked<?php endif; ?> value="0">
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
      editUsuario()
    }
  });
  $('#FEditUsuario').validate({
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