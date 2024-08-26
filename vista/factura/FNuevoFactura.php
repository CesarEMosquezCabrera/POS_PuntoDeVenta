<form action="" id="FRegFactura">
    <div class="modal-header">
        <h4 class="modal-title">Ingreso de Factura</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

    <div class="form-group">
        <label for="exampleInputBorder">Codigo</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="codFact" id="codFact">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Id Cliente</label>
        <input type="text" class="form-control form-control-border"  placeholder="" name="IdCli" id="IdCli">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Detalle</label>
        <input type="text" class="form-control form-control-border"  placeholder="" name="detail" id="detail">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Neto</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="neto" id="neto">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Descuento</label>
        <input type="text" class="form-control form-control-border"  placeholder="" name="descuento" id="descuento">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Total</label>
        <input type="text" class="form-control form-control-border"  placeholder="" name="total" id="total">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Fecha Emision</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="fechaEmision" id="fechaEmision">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">CUFD</label>
        <input type="text" class="form-control form-control-border"  placeholder="" name="cufd" id="cufd">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">CUF</label>
        <input type="text" class="form-control form-control-border"  placeholder="" name="cuf" id="cuf">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">XML</label>
        <input type="text" class="form-control form-control-border" placeholder="" name="xml" id="xml">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">ID punto de venta</label>
        <input type="text" class="form-control form-control-border"  placeholder="" name="IDVenta" id="IDVenta">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">ID Usuario</label>
        <input type="text" class="form-control form-control-border"  placeholder="" name="IdUser" id="IdUser">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Usuario</label>
        <input type="text" class="form-control form-control-border"  placeholder="" name="User" id="User">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Leyenda</label>
        <input type="text" class="form-control form-control-border"  placeholder="" name="leyenda" id="leyenda">
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
      regFactura()
    }
  });
  $('#FRegFactura').validate({
    rules: {
      codFact: {
        required: true,
        minlength: 1,
      },
      IdCli: {
        required: true,
        minlength: 1,
      },
      detail: {
        required: true,
        minlength: 1,
      },
      neto: {
        required: true,
        minlength: 1,
      },
      descuento: {
        required: true,
        minlength: 1,
      },
      total: {
        required: true,
        minlength: 1,
      },
      fechaEmision: {
        required: true,
        minlength: 1,
      },
      cufd: {
        required: true,
        minlength: 1,
      },
      cuf: {
        required: true,
        minlength: 1,
      },
      xml: {
        required: true,
        minlength: 1,
      },
      IDVenta: {
        required: true,
        minlength: 1,
      },
      IdUser: {
        required: true,
        minlength: 1,
      },
      User: {
        required: true,
        minlength: 1,
      },
      leyenda: {
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