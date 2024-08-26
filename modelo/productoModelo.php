<?php
require_once "conexion.php";
class ModeloProducto{
    static public function mdlAccesoProducto($producto){
    $stmt=Conexion::conectar()->prepare("select * from producto where login_producto='$producto'");
    $stmt->execute();
    return $stmt->fetch();

    // $stmt->closeCursor();
    // $stmt-->null;
    }
    static public function mdlInfoProductos(){
    $stmt=Conexion::conectar()->prepare("select * from producto");
    $stmt->execute();
    return $stmt->fetchAll();

    // $stmt->closeCursor();
    // $stmt-->null;
    }
    static public function mdlRegProducto($data){
        $codigoProducto=$data["codigoProducto"];
        $nombreProducto=$data["nombreProducto"];
        $precioProducto=$data["precioProducto"];
        $unidadProducto=$data["unidadProducto"];
        $imagenProducto=$data["imagenProducto"];
        $unidadSINProducto=$data["unidadSINProducto"];
        $codigoSINProducto=$data["codigoSINProducto"];

        $stmt=Conexion::conectar()->prepare("insert into producto(cod_producto,cod_producto_sin,nombre_producto,precio_producto,unidad_medida,unidad_medida_sin,imagen_producto)values('$codigoProducto','$codigoSINProducto','$nombreProducto','$precioProducto','$unidadProducto','$unidadSINProducto','$imagenProducto')");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";   
        }
        // $stmt->closeCursor();
        // $stmt-->null;
    }
    static public function mdlInfoProducto($id){
        $stmt=Conexion::conectar()->prepare("select * from producto where id_producto=$id");
        $stmt->execute();
        return $stmt->fetch();
    
        // $stmt->closeCursor();
        // $stmt-->null;
    }
    static public function mdlEditProducto($data){
        // var_dump($data);
        $id=$data["idProducto"];
        $nombreProducto=$data["nombreProducto"];
        $precioProducto=$data["precioProducto"];
        $unidadProducto=$data["unidadProducto"];
        $unidadSINProducto=$data["unidadSINProducto"];
        $codigoSINProducto=$data["codigoSINProducto"];
        $imagenProducto=$data["imagenProducto"];
        $disponibleProducto=$data["disponibleProducto"];

        $stmt=Conexion::conectar()->prepare("update producto set cod_producto_sin='$codigoSINProducto', nombre_producto='$nombreProducto', precio_producto='$precioProducto', unidad_medida='$unidadProducto', unidad_medida_sin='$unidadSINProducto', imagen_producto='$imagenProducto', disponible='$disponibleProducto' where id_producto=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        // $stmt->closeCursor();
        // $stmt-->null;
    }
    static public function mdlEliProducto($id){

        $stmt=Conexion::conectar()->prepare("delete from producto where id_producto=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        // $stmt->closeCursor();
        // $stmt-->null;
    }
    static public function mdlActualizarAcceso($fechaHora, $id){
        $stmt=Conexion::conectar()->prepare("update producto set ultimo_login='$fechaHora' where id_producto='$id'");
        
        if($stmt->execute()){
          return "ok";
        }else{
          return "error";
        }
        // $stmt->closeCursor();
        // $stmt-->null;
      }
}   