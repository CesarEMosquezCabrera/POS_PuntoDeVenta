

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de <b>FACTURAS</b> Registrados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Codigo</th>
                    <th>IdClient</th>
                    <th>Detalle</th>
                    <th>Neto</th>
                    <th>Descut</th>
                    <th>Total</th>
                    <th>FeEmision</th>
                    <th>CUFD</th>
                    <th>CUF</th>
                    <th>XML</th>
                    <th>IdVenta</th>
                    <th>IdUsers</th>
                    <th>Usuario</th>
                    <th>Leyenda</th>
                    <td>
                      <button class="btn btn-primary" onclick="MNuevoFactura()">Nuevo</button>
                    </td>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    $usuario=ControladorFactura::ctrInfoFacturas();
                    // var_dump($usuario);
                    foreach($usuario as $value){
                      ?>
                      <tr>
                        <td><?php echo $value["id_factura"]; ?></td>
                        <td><?php echo $value["cod_factura"]; ?></td>
                        <td><?php echo $value["id_cliente"]; ?></td>                        
                        <td><?php echo $value["detalle"]; ?></td>
                        <td><?php echo $value["neto"]; ?></td>
                        <td><?php echo $value["descuento"]; ?></td>
                        <td><?php echo $value["total"]; ?></td>
                        <td><?php echo $value["fecha_emision"]; ?></td>                        
                        <td><?php echo $value["cufd"]; ?></td>
                        <td><?php echo $value["cuf"]; ?></td>
                        <td><?php echo $value["xml"]; ?></td>
                        <td><?php echo $value["id_punto_venta"]; ?></td>
                        <td><?php echo $value["id_usuario"]; ?></td>                        
                        <td><?php echo $value["usuario"]; ?></td>
                        <td><?php echo $value["leyenda"]; ?></td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-secundary" onclick="MEditFactura(<?php echo $value["id_usuario"]; ?>)">
                              <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger" onclick="MEliFactura(<?php echo $value["id_usuario"]; ?>)">
                              <i class="fas fa-trash"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>

                  <!-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot> -->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   


 