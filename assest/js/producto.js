

function MNuevoProducto(){
    $("#modal-warning").modal("show");

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/producto/FNuevoProducto.php",
        data:obj,
        success:function(data){
            $("#content-warning").html(data)
        }
    })
}

function regProducto() {
    var formData=new FormData($("#FRegProducto")[0])
        $.ajax({
            type:"POST",
            url:"controlador/productoControlador.php?ctrRegProducto",
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(data){

                //console.log(data)
                
                if(data="ok"){
                    Swal.fire({
                        icon:"success",
                        showConfirmButton:false,
                        title:"El producto a sido registrado",
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

function MEditProducto(id) {
    $("#modal-warning").modal("show");

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/producto/FEditProducto.php?id="+id,
        data:obj,
        success:function(data){
            $("#content-warning").html(data)
        }
    })
}

function editProducto() {
    var formData=new FormData($("#FEditProducto")[0])

        $.ajax({
            type:"POST",
            url:"controlador/productoControlador.php?ctrEditProducto",
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
                        title:"El producto ha sido ACTUALIZADO",
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

function MEliProducto(id){
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
                url:"controlador/productoControlador.php?ctrEliProducto",
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

function previsualizar() {
    console.log("sss");
    let imagen=document.getElementById("imgProducto").files[0]
    if (imagen["type"]!="image/png" && imagen["type"]!="image/jpeg") {
        $("#imgProducto").val("") 
        Swal.fire({
            icon:'error',
            showConfirmButton:false,
            tittle:"El archivo no es PNG o JPEG",
        })
    }else if(imagen["size"]>10000000){
        $("#imgProducto").val("")
        Swal.fire({
            icon:'error',
            showConfirmButton:false,
            tittle:"El archivo es mayor a 10MB",
        })
    }else{
        let datosImagen=new FileReader
        datosImagen.readAsDataURL(imagen)
        $(datosImagen).on("load",function(event){
            let rutaImagen=event.target.result
            $(".previsualizar").attr("src",rutaImagen)
        })
    }
}
function Eprevisualizar() {
    console.log("sss22");
    let imagen=document.getElementById("imgProducto2").files[0]
    if (imagen["type"]!="image/png" && imagen["type"]!="image/jpeg") {
        $("#imgProducto2").val("") 
        Swal.fire({
            icon:'error',
            showConfirmButton:false,
            tittle:"El archivo no es PNG o JPEG",
        })
    }else if(imagen["size"]>10000000){
        $("#imgProducto2").val("")
        Swal.fire({
            icon:'error',
            showConfirmButton:false,
            tittle:"El archivo es mayor a 10MB",
        })
    }else{
        let datosImagen=new FileReader
        datosImagen.readAsDataURL(imagen)
        $(datosImagen).on("load",function(event){
            let rutaImagen=event.target.result
            $(".previsualizar").attr("src",rutaImagen)
        })
    }
}

function SinCatalogo(){
    var obj={
        // nit: 338794023
        // cuis: 9272DC05
        codigoAmbiente:2,
        codigoPuntoVenta: 0,
        codigoPuntoVentaSpecified: true,
        codigoSistema: "775FA42BE90F7B78EF98F57",
        cuis: "9272DC05",
        nit: 338794023
    }
    //console.log("Aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1");
    $.ajax({
        type: "POST",
        url: "http://localhost:5000/Sincronizacion/listaproductosservicios?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJTdXBlcmppY2hvMzMiLCJjb2RpZ29TaXN0ZW1hIjoiNzc1RkE0MkJFOTBGN0I3OEVGOThGNTciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0ydGpDM05ERXdNZ1lBOFFXMzNRa0FBQUE9IiwiaWQiOjYxODYwOCwiZXhwIjoxNzMzOTYxNjAwLCJpYXQiOjE3MDI0OTc2NjAsIm5pdERlbGVnYWRvIjozMzg3OTQwMjMsInN1YnNpc3RlbWEiOiJTRkUifQ.4K_pQUXnIhgI5ymmXoyL43i0pSk3uKCgLMkmQeyl67h7j55GSRsH120AD44pR0aQ1UX_FNYzWQBYrX6pWLd-1w",
        data: JSON.stringify(obj),
        cache: false,
        contentType: "application/json",
        success: function(data){
            //console.log("Aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa2");
            console.log(data)

            //CESAR este codigo elimina la primera fila 
            var tbody = document.getElementById("CatProductos");
            while (tbody.firstChild) {
                tbody.removeChild(tbody.firstChild);
            }
            //tbody.deleteRow(0);
            //END CESAR

            for (var i = 0; i < data["listaCodigos"].length; i++) {
                $("#CatProductos").append("<tr><td>"+data["listaCodigos"][i]["codigoActividad"]+"</td><td>"+data["listaCodigos"][i]["codigoProducto"]+"</td><td>"+data["listaCodigos"][i]["descripcionProducto"]+"</td><td></td></tr>")
            }
        }
    })
}
function unidadesMedida(){
    var obj={
        codigoAmbiente:2,
        codigoPuntoVenta: 0,
        codigoPuntoVentaSpecified: true,
        codigoSistema: "775FA42BE90F7B78EF98F57",
        cuis: "9272DC05",
        nit: 338794023
    }
    $.ajax({
        type: "POST",
        url: "http://localhost:5000/Sincronizacion/unidadmedida?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJTdXBlcmppY2hvMzMiLCJjb2RpZ29TaXN0ZW1hIjoiNzc1RkE0MkJFOTBGN0I3OEVGOThGNTciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0ydGpDM05ERXdNZ1lBOFFXMzNRa0FBQUE9IiwiaWQiOjYxODYwOCwiZXhwIjoxNzMzOTYxNjAwLCJpYXQiOjE3MDI0OTc2NjAsIm5pdERlbGVnYWRvIjozMzg3OTQwMjMsInN1YnNpc3RlbWEiOiJTRkUifQ.4K_pQUXnIhgI5ymmXoyL43i0pSk3uKCgLMkmQeyl67h7j55GSRsH120AD44pR0aQ1UX_FNYzWQBYrX6pWLd-1w",
        data: JSON.stringify(obj),
        cache: false,
        contentType: "application/json",
        success: function(data){
            console.log(data)
        }
    })
}

function MVerProducto(id) {
    $("#modal-lg").modal("show");

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/producto/MVerProducto.php?id="+id,
        data:obj,
        success:function(data){
            $("#content-lg").html(data)
        }
    })  
}

function SELECTPRODSIN() {
    var obj={
        // nit: 338794023
        // cuis: 9272DC05
        codigoAmbiente:2,
        codigoPuntoVenta: 0,
        codigoPuntoVentaSpecified: true,
        codigoSistema: "775FA42BE90F7B78EF98F57",
        cuis: "9272DC05",
        nit: 338794023
    }
    $.ajax({
        type: "POST",
        url: "http://localhost:5000/Sincronizacion/listaproductosservicios?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJTdXBlcmppY2hvMzMiLCJjb2RpZ29TaXN0ZW1hIjoiNzc1RkE0MkJFOTBGN0I3OEVGOThGNTciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0ydGpDM05ERXdNZ1lBOFFXMzNRa0FBQUE9IiwiaWQiOjYxODYwOCwiZXhwIjoxNzMzOTYxNjAwLCJpYXQiOjE3MDI0OTc2NjAsIm5pdERlbGVnYWRvIjozMzg3OTQwMjMsInN1YnNpc3RlbWEiOiJTRkUifQ.4K_pQUXnIhgI5ymmXoyL43i0pSk3uKCgLMkmQeyl67h7j55GSRsH120AD44pR0aQ1UX_FNYzWQBYrX6pWLd-1w",
        data: JSON.stringify(obj),
        cache: false,
        contentType: "application/json",
        success: function(data){
            for (var i = 0; i < data["listaCodigos"].length; i++) {
                $("#DDD").append("<option value="+data["listaCodigos"][i]["codigoProducto"]+">"+data["listaCodigos"][i]["codigoProducto"]+"</option>")
            }
        }
    })  
}
