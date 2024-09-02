<?php
    $ruta=parse_url($_SERVER["REQUEST_URI"]);
    // var_dump($ruta);

    if(isset($ruta["query"])){
        if($ruta["query"]=="ctrRegFactura" ||
        $ruta["query"]=="ctrEditFactura" ||
        $ruta["query"]=="ctrNumFactura" ||
        $ruta["query"]=="ctrEliFactura"){
            $metodo=$ruta["query"];
            $factura=new ControladorFactura();
            $factura->$metodo();
        }
    }

class ControladorFactura{
    static public function ctrInfoFacturas(){
        $respuesta=ModeloFactura::mdlInfoFacturas();
        return $respuesta;
    }
    // static public function ctrRegFactura(){
    //     // $respuesta=ModeloFactura::mdlInfoFacturas();
    //     // return $respuesta;

    //     require "../modelo/facturaModelo.php";
    //     $data=array(
    //         "codFactFactura"=>$_POST["codFact"],
    //         "IdCliFactura"=>$_POST["IdCli"],
    //         "detailFactura"=>$_POST["detail"],
    //         "netoFactura"=>$_POST["neto"],
    //         "descuentoFactura"=>$_POST["descuento"],
    //         "totalFactura"=>$_POST["total"],
    //         "fechaEmisionFactura"=>$_POST["fechaEmision"],
    //         "cufdFactura"=>$_POST["cufd"],
    //         "cufFactura"=>$_POST["cuf"],
    //         "xmlFactura"=>$_POST["xml"],
    //         "IDVentaFactura"=>$_POST["IDVenta"],
    //         "IdUserFactura"=>$_POST["IdUser"],
    //         "UserFactura"=>$_POST["User"],
    //         "leyendaFactura"=>$_POST["leyenda"]
    //     );
    //     $respuesta=ModeloFactura::mdlRegFactura($data);
    //     echo $respuesta;
    // }
    static public function ctrInfoFactura($id){
        $respuesta=ModeloFactura::mdlInfoFactura($id);
        return $respuesta;
    }
    static public function ctrEditFactura(){
        require "../modelo/facturaModelo.php";

        if($_POST["password"]==$_POST["passActual"]){
            $password=$_POST["password"];
        }else{
            $password=password_hash($_POST["password"], PASSWORD_DEFAULT);
        }
        $data=array(
            "password"=>$password,
            "id"=>$_POST["idFactura"],
            "perfil"=>$_POST["perfil"],
            "estado"=>$_POST["estado"]
        );
        ModeloFactura::mdlEditFactura($data);
        $respuesta=ModeloFactura::mdlEditFactura($data);
        echo $respuesta;
    }
    static function ctrEliFactura(){
        require "../modelo/facturaModelo.php";
        $id=$_POST["id"];
        $respuesta=ModeloFactura::mdlEliFactura($id);
        echo $respuesta;
    }
    static function ctrNumFactura(){
        require "../modelo/facturaModelo.php";
        $respuesta=ModeloFactura::mdlNumFactura();
        if($respuesta["max(id_factura)"]==null){
            echo "1";
        }else{
            echo $respuesta["max(id_factura)"]+1;
        }
    }
}