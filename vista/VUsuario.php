

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
                <h3 class="card-title">Lista de <b>USUARIOS</b> Registrados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Perfil</th>
                    <th>Estado</th>
                    <th>Ultimo acceso</th>
                    <th>Fecha de registro</th>
                    <td>
                      <button class="btn btn-primary" onclick="MNuevoUsuario()">Nuevo</button>
                    </td>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    $usuario=ControladorUsuario::ctrInfoUsuarios();
                    // var_dump($usuario);
                    foreach($usuario as $value){
                      ?>
                      <tr>
                        <td><?php echo $value["id_usuario"]; ?></td>
                        <td><?php echo $value["login_usuario"]; ?></td>
                        <td><?php echo $value["perfil"]; ?></td>

                        <td>
                          <?php
                          if($value["estado_usuario"]==1){?>
                          <span class="badge badge-success">Activo</span>
                            <?php
                          }else{
                            ?>
                            <span class="badge badge-danger">Inactivo</span>
                            <?php
                          }
                          ?>
                        </td>

                        
                        <td><?php echo $value["ultimo_login"]; ?></td>
                        <td><?php echo $value["fecha_registro"]; ?></td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-secundary" onclick="MEditUsuario(<?php echo $value["id_usuario"]; ?>)">
                              <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger" onclick="MEliUsuario(<?php echo $value["id_usuario"]; ?>)">
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
   


 