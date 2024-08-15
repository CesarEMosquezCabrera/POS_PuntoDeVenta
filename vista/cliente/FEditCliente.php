<?php
    require_once "../../controlador/clienteControlador.php";

    require_once "../../modelo/clienteModelo.php";

    $id=$_GET["id"];
    $cliente=ControladorCliente::ctrInfoCliente($id);
    echo "<script>console.log('.$id.');</script>";
?>

<form action="" id="FEditCliente">
    <div class="modal-header">
        <h4 class="modal-title">Ingreso de Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body row">

    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Razon Social</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="razon" id="razon" value="<?php echo $cliente["razon_social_cliente"]; ?>">
        <input type="hidden" name="idCliente" value="<?php echo $cliente["id_cliente"]; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">nit ci Cliente</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="nit" id="nit" value="<?php echo $cliente["nit_ci_cliente"]; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Direccion</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="direccion" id="direccion" value="<?php echo $cliente["direccion_cliente"]; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Nombre</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="nombre" id="nombre" value="<?php echo $cliente["nombre_cliente"]; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Telefono</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="telefono" id="telefono" value="<?php echo $cliente["telefono_cliente"]; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Email</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="email" id="email" value="<?php echo $cliente["email_cliente"]; ?>">
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
      editCliente()
    }
  });
  $('#FEditCliente').validate({
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