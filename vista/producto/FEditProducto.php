<?php
    require_once "../../controlador/productoControlador.php";

    require_once "../../modelo/productoModelo.php";

    $id=$_GET["id"];
    $producto=ControladorProducto::ctrInfoProducto($id);
?>

<form action="" id="FEditProducto">
    <div class="modal-header">
        <h4 class="modal-title">Editar Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="exampleInputBorder">Codigo Producto</label>
            <input type="text" class="form-control form-control-border" placeholder="" name="codigo" id="codigo" value="<?php echo $producto["cod_producto"]; ?>" readonly>
            <input type="hidden" name="idProducto" value="<?php echo $producto["id_producto"]; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="exampleInputBorder">Codigo Producto SIN</label>
            <input type="text" class="form-control form-control-border" placeholder="" name="codigoSIN" id="codigoSIN" value="<?php echo $producto["cod_producto_sin"]; ?>">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="exampleInputBorder">Descripcion Producto</label>
            <input type="text" class="form-control form-control-border" placeholder="" name="nombre" id="nombre" value="<?php echo $producto["nombre_producto"]; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="exampleInputBorder">Precio Producto</label>
            <input type="number" class="form-control form-control-border" placeholder="" name="precio" id="precio" value="<?php echo $producto["precio_producto"]; ?>">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="exampleInputBorder">Unidad Medida</label>
            <input type="text" class="form-control form-control-border" placeholder="" name="unidad" id="unidad" value="<?php echo $producto["unidad_medida"]; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="exampleInputBorder">Unidad Medida SIN</label>
            <input type="text" class="form-control form-control-border" placeholder="" name="unidadSIN" id="unidadSIN" value="<?php echo $producto["unidad_medida_sin"]; ?>">
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
                <input type="hidden" name="imgActual" value="<?php echo $producto["imagen_producto"]; ?>  ">
                <label class="custom-file-label" for="imgProducto">Elegir Archivo</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Subir</span>
              </div>
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
        </div>
        <div class="col-sm-6">
          <div class="form-group" style="text-align:center;">
          <?php 
          if ($producto["imagen_producto"]=="" || !preg_match("/\.(png|jpe?g)$/i", $producto["imagen_producto"])){
          ?>
          <img src="assest/dist/img/product_default.png" width=150px height=auto alt="Imagenes">
          <?php 
          }else{
          ?>
          <img src="assest/dist/img/productos/<?php echo $producto["imagen_producto"]; ?>" width=150px height=auto alt="Imagenes">
          <?php 
          }
          ?>
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