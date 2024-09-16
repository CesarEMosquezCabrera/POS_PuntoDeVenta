

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
                    <th># FACTURA</th>
                    <th>Cliente</th>
                    <th>Emitido</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <td>
                      <a href="FormVenta" class="btn btn-primary">Nuevo</a>
                      <!-- <button class="btn btn-primary" onclick="MNuevoFactura()">Nuevo</button> -->
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
                        <td><?php echo $value["cod_factura"]; ?></td>
                        <td><?php echo $value["razon_social_cliente"]; ?></td>
                        <td><?php echo $value["fecha_emision"]; ?></td>                        
                        <td><?php echo $value["total"]; ?></td>
                        <td>
                          <?php
                          if($value["estado_factura"]==1){?>
                          <span class="badge badge-success">Emitido</span>
                            <?php
                          }else{
                            ?>
                            <span class="badge badge-danger">Anulada</span>
                            <?php
                          }
                          ?>
                        </td>
                        <td>
                          <div class="btn-group">
                          <button class="btn btn-info" onclick="MVerFactura(<?php echo $value["id_factura"]; ?>)">
                              <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-danger" onclick="MEliFactura(<?php echo $value["id_factura"]; ?>)">
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
   


 