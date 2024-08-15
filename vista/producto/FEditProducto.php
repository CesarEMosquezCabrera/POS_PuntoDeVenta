<?php
    require_once "../../controlador/productoControlador.php";

    require_once "../../modelo/productoModelo.php";

    $id=$_GET["id"];
    $producto=ControladorProducto::ctrInfoProducto($id);
?>

<form action="" id="FEditProducto">
    <div class="modal-header">
        <h4 class="modal-title">Ingreso de Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body row">

    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Codigo Producto</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="codigo" id="codigo" value="<?php echo $producto["cod_producto"]; ?>">
        <input type="hidden" name="idProducto" value="<?php echo $producto["id_producto"]; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Nombre Producto</label>
        <input type="text" class="form-control form-control-border"  placeholder="" name="nombre" id="nombre"  value="<?php echo $producto["nombre_producto"]; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Precio Producto</label>
        <input type="text" class="form-control form-control-border"  placeholder="" name="precio" id="precio"  value="<?php echo $producto["precio_producto"]; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Unidad Producto</label>
        <input type="text" class="form-control form-control-border"  placeholder="" name="unidad" id="unidad"  value="<?php echo $producto["unidad_medida"]; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Imagen Producto</label>
        <input type="text" class="form-control form-control-border"  placeholder="" name="imagen" id="imagen"  value="<?php echo $producto["imagen_producto"]; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Estado</label>

        <div class="row">
              <div class="col-sm-6">
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="disponible" name="disponible" <?php if($producto["disponible"]=="1"):?>checked<?php endif; ?> value="1">
                  <label for="estadoActivo" class="form-check-label">Disponible</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="disponible" name="disponible" <?php if($producto["disponible"]=="0"):?>checked<?php endif; ?> value="0">
                  <label for="estadoInactivo" class="form-check-label">No Disponible</label>
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
      editProducto()
    }
  });
  $('#FEditProducto').validate({
    rules: {
      codigo: {
        required: true,
        minlength: 1,
      },
      nombre: {
        required: true,
        minlength: 1,
      },
      precio: {
        required: true,
        minlength: 1,
      },
      unidad: {
        required: true,
        minlength: 1,
      },
      imagen: {
        required: true,
        minlength: 1,
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