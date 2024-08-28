
// Variables GLOBALES
var host="http://localhost:5000/"
function verificarComunicacion() {
    var obj=""
    $.ajax({
        type:"POST",
        url:host+"api/CompraVenta/comunicacion",
        data:obj,
        cache:false,
        contentType:"application/json",
        processData:false,
        success:function(data){
            if(data['transaccion']==true){
                console.log("linea")
                document.getElementById("comunSiat").innerHTML="Conectado"
                document.getElementById("comunSiat").className="badge badge-success"
            }
        }
    }).fail(function(jqXHR, textStatus, errorThrown){
        if(jqXHR.status==0){
            document.getElementById("comunSiat").innerHTML="Desconectado"
            document.getElementById("comunSiat").className="badge badge-danger"
        }
    })
}

setInterval(verificarComunicacion,3000)

function busCliente() {
    let nitCliente=document.getElementById("nitCliente").value
    console.log(nitCliente)
    var obj={
        nitCliente:nitCliente
    }
    console.log("AAAAAAAAAAAAA")
    $.ajax({
        type:"POST",
        url:"controlador/clienteControlador.php?ctrBusCliente",
        data:obj,
        dataType:"json",
        success:function(data){
            console.log("AAAAAAAAAAAAA")
            console.log(data)
            console.log("AAAAAAAAAAAAA")
        }
    })
}

function MNuevoFactura(){
    $("#modal-warning").modal("show");

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/factura/FNuevoFactura.php",
        data:obj,
        success:function(data){
            $("#content-warning").html(data)
        }
    })
}

function regFactura() {
    var formData=new FormData($("#FRegFactura")[0])
        $.ajax({
            type:"POST",
            url:"controlador/facturaControlador.php?ctrRegFactura",
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(data){

                // console.log(data)
                
                if(data="ok"){
                    Swal.fire({
                        icon:"success",
                        showConfirmButton:false,
                        title:"La factura a sido registrado",
                        timer:1000
                    })
                    setTimeout(function() {
                        location.reload()
                    },1200)
                }else{
                    Swal.fire({
                        title:"ERROR!",
                        icon:"error",
                        showConfirmButton:false,
                        timer:1000
                    })
                }

            }
        })
}

function MEditFactura(id) {
    $("#modal-warning").modal("show");

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/factura/FEditFactura.php?id="+id,
        data:obj,
        success:function(data){
            $("#content-warning").html(data)
        }
    })
}

function editFactura() {
    var formData=new FormData($("#FEditFactura")[0])

    if(formData.get("password")==formData.get("vrPassword")){
        $.ajax({
            type:"POST",
            url:"controlador/facturaControlador.php?ctrEditFactura",
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(data){

                console.log(data)
                
                if(data="ok"){
                    Swal.fire({
                        icon:"success",
                        showConfirmButton:false,
                        title:"El factura ha sido ACTUALIZADO",
                        timer:1000
                    })
                    setTimeout(function() {
                        location.reload()
                    },1200)
                }else{
                    Swal.fire({
                        title:"ERROR!",
                        icon:"error",
                        showConfirmButton:false,
                        timer:1000
                    })
                }

            }
        })
    }
}

function MEliFactura(id){
    var obj={
        id:id
    }
    Swal.fire({
        title:"¿Estas seguro?",
        showDenyButton:true,
        ShowCancelButton:false,
        confirmButtonText:'Confirmar',
        denyButtonText:'Cancelar'
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                type:"POST",
                url:"controlador/facturaControlador.php?ctrEliFactura",
                data:obj,
                success:function(data){
                    if(data=="ok"){
                        location.reload();
                    }else{
                        Swal.fire({
                            icon:"error",
                            showConfirmButton:false,
                            title:'ERROR',
                                text:'No pudimos eliminarlo',
                            timer:1000
                        })
                    }
                }
            })
        }
    })
}