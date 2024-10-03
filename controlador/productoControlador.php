<?php
    $ruta=parse_url($_SERVER["REQUEST_URI"]);
    // var_dump($ruta);

    if(isset($ruta["query"])){
        if($ruta["query"]=="ctrRegProducto" ||
        $ruta["query"]=="ctrEditProducto" ||
        $ruta["query"]=="ctrBusProducto" ||
        $ruta["query"]=="ctrEliProducto"){
            $metodo=$ruta["query"];
            $producto=new ControladorProducto();
            $producto->$metodo();
        }
    }

class ControladorProducto{

    static public function ctrIngresoProducto(){
        if(isset($_POST["producto"])){
            $producto=$_POST["producto"];
            $password=$_POST["password"];

            $resultado=ModeloProducto::mdlAccesoProducto($producto);

            // if($resultado["login_producto"]==$producto && $resultado["password"]==$password && $resultado["estado_producto"]==1){
            //     echo "CORRECTO";
            // }
            // else{
            //     echo "YAAAAAAAAA";
            // }



            if($resultado["login_producto"]==$producto && $resultado["password"]==$password && $resultado["estado_producto"]==1){
                echo '<script>
                window.location="inicio";
                </script>';
            }



            // if($resultado["login_producto"]==$producto && password_verify($password,$resultado["password"]) && $resultado["estado_producto"]==1){
        
            //     $_SESSION["ingreso"]=$resultado["login_producto"];
            //     $_SESSION["perfil"]=$resultado["perfil"];
            //     $_SESSION["idProducto"]=$resultado["id_producto"];
            //     $_SESSION["ingreso"]="ok";
                
            //     date_default_timezone_set("America/La_Paz");
            //     $fecha=date("Y-m-d");
            //     $hora=date("H-i-s");
                
            //     $fechaHora=$fecha." ".$hora;
            //     $id=$resultado["id_producto"];
                
            //     $ultimoLogin=ModeloProducto::mdlActualizarAcceso($fechaHora, $id);
                
            //     if($ultimoLogin=="ok"){
                  
            //       echo '<script>
                
            //     window.location="inicio";
                
                
            //     </script>';
            //     }
                
                
            // }
        }
    }

    static public function ctrInfoProductos(){
        $respuesta=ModeloProducto::mdlInfoProductos();
        return $respuesta;
    }
    static public function ctrRegProducto(){
        require "../modelo/productoModelo.php";

        $imagen=$_FILES["imgProducto"];
        $imgNombre=$imagen["name"];
        $imgTmp=$imagen["tmp_name"];
        move_uploaded_file($imgTmp,"../assest/dist/img/productos/".$imgNombre);
        $data=array(
            "codigoProducto"=>$_POST["codigo"],
            "nombreProducto"=>$_POST["nombre"],
            "precioProducto"=>$_POST["precio"],
            "unidadProducto"=>$_POST["unidad"],
            "unidadSINProducto"=>$_POST["unidadSIN"],
            "codigoSINProducto"=>$_POST["codigoSIN"],
            "imagenProducto"=>$imgNombre,
            //$_FILES["imagen"]["name"]
        );
        $respuesta=ModeloProducto::mdlRegProducto($data);
        echo $respuesta;
    }
    static public function ctrInfoProducto($id){
        $respuesta=ModeloProducto::mdlInfoProducto($id);
        return $respuesta;
    }
    static public function ctrEditProducto(){
        require "../modelo/productoModelo.php";

        $imagen=$_FILES["imgProducto"];
        if($imgNombre=$imagen["name"]==""){
            $imgNombre=$_POST["imgActual"]=="";
        }else{
            $imgNombre=$imagen["name"];
            $imgTmp=$imagen["tmp_name"];
            move_uploaded_file($imgTmp,"../assest/dist/img/productos/".$imgNombre);
        }
        
        $data=array(
            "idProducto"=>$_POST["idProducto"],
            "nombreProducto"=>$_POST["nombre"],
            "precioProducto"=>$_POST["precio"],
            "unidadProducto"=>$_POST["unidad"],
            "unidadSINProducto"=>$_POST["unidadSIN"],
            "codigoSINProducto"=>$_POST["codigoSIN"],
            "disponibleProducto"=>$_POST["disponible"],
            "imagenProducto"=>$imgNombre,
            //$_FILES["imagen"]["name"]
        );
        ModeloProducto::mdlEditProducto($data);
        $respuesta=ModeloProducto::mdlEditProducto($data);
        echo $respuesta;
    }
    static public function ctrEliProducto(){
        require "../modelo/productoModelo.php";
        $id=$_POST["id"];
        $respuesta=ModeloProducto::mdlEliProducto($id);
        echo $respuesta;
    }
    static public function ctrBusProducto(){
        require "../modelo/productoModelo.php";
        $codProducto=$_POST["codProducto"];
        $respuesta = ModeloProducto::mdlBusProducto($codProducto);
        echo json_encode($respuesta);
        //echo $respuesta;
        //echo "<script>console.log('aa')</script>";
    }

    static public function ctrCantidadProductos(){
        $respuesta = ModeloProducto::mdlCantidadProductos();
        return $respuesta;
        //echo $respuesta;
        //echo "<script>console.log('aa')</script>";
    }
}