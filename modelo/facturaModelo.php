<?php
require_once "conexion.php";
class ModeloFactura{

    static public function mdlInfoFacturas(){
    $stmt=Conexion::conectar()->prepare("SELECT id_factura, cod_factura, razon_social_cliente, fecha_emision, total,estado_factura FROM factura JOIN cliente ON cliente.id_cliente=factura.id_cliente");
    $stmt->execute();
    return $stmt->fetchAll();

    // $stmt->closeCursor();
    // $stmt-->null;
    }
    // static public function mdlRegFactura($data){
    //     $codFactFactura=$data["codFactFactura"];
    //     $IdCliFactura=$data["IdCliFactura"];
    //     $detailFactura=$data["detailFactura"];
    //     $netoFactura=$data["netoFactura"];
    //     $descuentoFactura=$data["descuentoFactura"];
    //     $totalFactura=$data["totalFactura"];
    //     $fechaEmisionFactura=$data["fechaEmisionFactura"];
    //     $cufdFactura=$data["cufdFactura"];
    //     $cufFactura=$data["cufFactura"];
    //     $xmlFactura=$data["xmlFactura"];
    //     $IDVentaFactura=$data["IDVentaFactura"];
    //     $IdUserFactura=$data["IdUserFactura"];
    //     $UserFactura=$data["UserFactura"];
    //     $leyendaFactura=$data["leyendaFactura"];

    //     $stmt=Conexion::conectar()->prepare("insert into factura(cod_factura,id_cliente,detalle,neto,descuento,total,fecha_emision,cufd,cuf,login_factura,password,perfil,password,perfil)values('$loginFactura','$password','$perfil')");

    //     if($stmt->execute()){
    //         return "ok";
    //     }else{
    //         return "error";
    //     }
    //     // $stmt->closeCursor();
    //     // $stmt-->null;
    // }
    static public function mdlInfoFactura($id){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM factura JOIN cliente ON cliente.id_cliente=factura.id_cliente where id_factura=$id");
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
    static public function mdlNumFactura(){
      $stmt=Conexion::conectar()->prepare("select max(id_factura) from factura");
      $stmt->execute();
      return $stmt->fetch();
    }
    static public function mdlNuevoCufd($data){
        $cufd=$data["cufd"];
        $fechaVigCufd=$data["fechaVigCufd"];
        $codControlCufd=$data["codControlCufd"];
        
        $stmt=Conexion::conectar()->prepare("insert into cufd(codigo_cufd,codigo_control,fecha_vigencia)values('$cufd','$codControlCufd','$fechaVigCufd')");

        if($stmt->execute()){
            return "ok";        
        }else{
            return "error";
        }
        // $stmt->closeCursor();
        // $stmt-->null;
    }
    static public function mdlUltimoCufd(){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM cufd WHERE id_cufd=(select max(id_cufd) from cufd)");
        $stmt->execute();
        return $stmt->fetch();
    
        // $stmt->closeCursor();
        // $stmt-->null;
    }
    static public function mdlLeyenda(){
        $stmt=Conexion::conectar()->prepare("SELECT * FROM leyenda order by rand() limit 1");
        $stmt->execute();
        return $stmt->fetch();
    }

    static public function mdlRegistrarFactura($data){
        
        $codFactura=$data["codFactura"];
        $idCliente=$data["idCliente"];
        $detalle=$data["detalle"];
        $neto=$data["neto"];
        $descuento=$data["descuento"];
        $total=$data["total"];
        $fechaEmision=$data["fechaEmision"];
        $cufd=$data["cufd"];
        $cuf=$data["cuf"];
        $xml=$data["xml"];
        $idUsuario=$data["idUsuario"];
        $usuario=$data["usuario"];
        $leyenda=$data["leyenda"];
        
        $stmt=Conexion::conectar()->prepare("insert into factura(cod_factura, id_cliente, detalle, neto, descuento, total, fecha_emision, cufd, cuf, xml, id_usuario, usuario, leyenda) values('$codFactura','$idCliente','$detalle','$neto','$descuento','$total','$fechaEmision','$cufd','$cuf','$xml','$idUsuario','$usuario','$leyenda')");
        if($stmt->execute()){
            return "ok";        
        }else{
            return "error";
        }
    }
}   