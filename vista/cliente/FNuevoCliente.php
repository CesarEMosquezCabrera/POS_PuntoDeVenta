<form action="" id="FRegCliente">
    <div class="modal-header  bg-info">
        <h4 class="modal-title">Ingreso de Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body row">

    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Razon Social</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="razon" id="razon">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">nit ci Cliente</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="nit" id="nit">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Direccion</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="direccion" id="direccion">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Nombre</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="nombre" id="nombre">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Telefono</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="telefono" id="telefono">
    </div>
    <div class="form-group col-sm-6">
        <label for="exampleInputBorder">Email</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="email" id="email">
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
      regCliente()
    }
  });
  $('#FRegCliente').validate({
    rules: {
      razon: {
        required: true,
        minlength: 3,
      },
      nit: {
        required: true,
        minlength: 3,
      },
      direccion: {
        required: true,
        minlength: 3,
      },
      nombre: {
        required: true,
        minlength: 3,
      },
      telefono: {
        required: true,
        minlength: 3,
      },
      email: {
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