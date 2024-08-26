<?php
require_once "conexion.php";
class ModeloFactura{
    static public function mdlAccesoFactura($factura){
    $stmt=Conexion::conectar()->prepare("select * from factura where login_factura='$factura'");
    $stmt->execute();
    return $stmt->fetch();

    // $stmt->closeCursor();
    // $stmt-->null;
    }
    static public function mdlInfoFacturas(){
    $stmt=Conexion::conectar()->prepare("select * from factura");
    $stmt->execute();
    return $stmt->fetchAll();

    // $stmt->closeCursor();
    // $stmt-->null;
    }
    static public function mdlRegFactura($data){
        $codFactFactura=$data["codFactFactura"];
        $IdCliFactura=$data["IdCliFactura"];
        $detailFactura=$data["detailFactura"];
        $netoFactura=$data["netoFactura"];
        $descuentoFactura=$data["descuentoFactura"];
        $totalFactura=$data["totalFactura"];
        $fechaEmisionFactura=$data["fechaEmisionFactura"];
        $cufdFactura=$data["cufdFactura"];
        $cufFactura=$data["cufFactura"];
        $xmlFactura=$data["xmlFactura"];
        $IDVentaFactura=$data["IDVentaFactura"];
        $IdUserFactura=$data["IdUserFactura"];
        $UserFactura=$data["UserFactura"];
        $leyendaFactura=$data["leyendaFactura"];

        $stmt=Conexion::conectar()->prepare("insert into factura(cod_factura,id_cliente,detalle,neto,descuento,total,fecha_emision,cufd,cuf,login_factura,password,perfil,password,perfil)values('$loginFactura','$password','$perfil')");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        // $stmt->closeCursor();
        // $stmt-->null;
    }
    static public function mdlInfoFactura($id){
        $stmt=Conexion::conectar()->prepare("select * from factura where id_factura=$id");
        $stmt->execute();
        return $stmt->fetch();
    
        // $stmt->closeCursor();
        // $stmt-->null;
    }
    static public function mdlEditFactura($data){
        // var_dump($data);
        $password=$data["password"];
        $perfil=$data["perfil"];
        $estado=$data["estado"];
        $id=$data["id"];

        $stmt=Conexion::conectar()->prepare("update factura set password='$password', perfil='$perfil', estado_factura='$estado' where id_factura=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        // $stmt->closeCursor();
        // $stmt-->null;
    }
    static public function mdlEliFactura($id){

        $stmt=Conexion::conectar()->prepare("delete from factura where id_factura=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        // $stmt->closeCursor();
        // $stmt-->null;
    }
    static public function mdlActualizarAcceso($fechaHora, $id){
        $stmt=Conexion::conectar()->prepare("update factura set ultimo_login='$fechaHora' where id_factura='$id'");
        
        if($stmt->execute()){
          return "ok";
        }else{
          return "error";
        }
        // $stmt->closeCursor();
        // $stmt-->null;
      }
}   