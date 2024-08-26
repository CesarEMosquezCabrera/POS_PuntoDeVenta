<form action="" id="FRegProducto">
    <div class="modal-header">
        <h4 class="modal-title">Ingreso de Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
      
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="exampleInputBorder">Codigo Producto</label>
            <input type="text" class="form-control form-control-border" placeholder="" name="codigo" id="codigo">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="exampleInputBorder">Codigo Producto SIN</label>
            <input type="text" class="form-control form-control-border" placeholder="" name="codigoSIN" id="codigoSIN">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="exampleInputBorder">Descripcion Producto</label>
            <input type="text" class="form-control form-control-border" placeholder="" name="nombre" id="nombre">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="exampleInputBorder">Precio Producto</label>
            <input type="number" class="form-control form-control-border" placeholder="" name="precio" id="precio">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="exampleInputBorder">Unidad Medida</label>
            <input type="text" class="form-control form-control-border" placeholder="" name="unidad" id="unidad">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="exampleInputBorder">Unidad Medida SIN</label>
            <input type="text" class="form-control form-control-border" placeholder="" name="unidadSIN" id="unidadSIN">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Imagen Producto <span class="text-muted">(Peso max. 10MB-JPG,PNG)</span></label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="imgProducto" name="imgProducto" onchange="previsualizar()">
                <label class="custom-file-label" for="imgProducto">Elegir Archivo</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Subir</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group" style="text-align:center;">
            <img src="assest/dist/img/product_default.png" alt="" width="150" class="img-thumbnail previsualizar">
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
      regProducto()
    }
  });
  $('#FRegProducto').validate({
    rules: {
      codigo: {
        required: true,
        minlength: 1,
      },
      codigoSIN: {
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
      unidadSIN: {
        required: true,
        minlength: 1,
        number: true
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