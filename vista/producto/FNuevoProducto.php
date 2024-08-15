<form action="" id="FRegProducto">
    <div class="modal-header">
        <h4 class="modal-title">Ingreso de Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body row">

    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Codigo Producto</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="codigo" id="codigo">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Nombre Producto</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="nombre" id="nombre">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Precio Producto</label>
        <input type="number" class="form-control form-control-border" placeholder="" name="precio" id="precio">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Unidad Medida</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="unidad" id="unidad">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Imagen Producto</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="imagen" id="imagen">
    </div>
    <!-- <div class="form-group">
        <label for="exampleInputBorder">Disponible</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="login" id="login">
    </div> -->

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
      regProducto()
    }
  });
  $('#FRegProducto').validate({
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