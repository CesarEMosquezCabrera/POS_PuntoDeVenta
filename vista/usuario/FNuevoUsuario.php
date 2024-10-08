<form action="" id="FRegUsuario">
    <div class="modal-header">
        <h4 class="modal-title">Ingreso de Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

    <div class="form-group">
        <label for="exampleInputBorder">Login Usuario</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="login" id="login">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Password</label>
        <input type="password" class="form-control form-control-border"  placeholder="" name="password" id="password">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Repetir Password</label>
        <input type="password" class="form-control form-control-border"  placeholder="" name="vrPassword" id="vrPassword">
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
      regUsuario()
    }
  });
  $('#FRegUsuario').validate({
    rules: {
      login: {
        required: true,
        minlength: 3,
      },
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