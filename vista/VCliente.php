

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
                <h3 class="card-title">Lista de <b>CLIENTES</b> Registrados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Razon Social</th>
                    <th>NIT CI</th>
                    <th>Direccion</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <td>
                      <button class="btn btn-primary" onclick="MNuevoCliente()">Nuevo</button>
                    </td>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    $cliente=ControladorCliente::ctrInfoClientes();
                    // var_dump($cliente);
                    foreach($cliente as $value){
                      ?>
                      <tr>
                        <td><?php echo $value["id_cliente"]; ?></td>
                        <td><?php echo $value["razon_social_cliente"]; ?></td>
                        <td><?php echo $value["nit_ci_cliente"]; ?></td>
                        <td><?php echo $value["direccion_cliente"]; ?></td>                        
                        <td><?php echo $value["nombre_cliente"]; ?></td>
                        <td><?php echo $value["telefono_cliente"]; ?></td>
                        <td><?php echo $value["email_cliente"]; ?></td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-secundary" onclick="MEditCliente(<?php echo $value["id_cliente"]; ?>)">
                              <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger" onclick="MEliCliente(<?php echo $value["id_cliente"]; ?>)">
                              <i class="fas fa-trash"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
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
   


 