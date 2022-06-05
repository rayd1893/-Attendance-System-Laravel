<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="card">
        <div class="card-header">
            Registro de asistencia de Kumites de SMP
        </div>
        <div class="card-body">
            <button id="btnAddVisita" 
                    class="btn btn-sm btn-success" 
                    style="margin-bottom: 10px;"
                    data-bs-toggle="modal" 
                    data-bs-target="#modalPersona">
                    Añadir
            </button>
            <button class="btn btn-sm btn-primary"
                    style="margin-bottom: 10px;"
                    data-bs-toggle="modal" 
                    data-bs-target="#modalResumen">
                Ver Resumen
            </button>
            <button class="btn btn-sm btn-secondary"
                    style="margin-bottom: 10px;"
                    data-bs-toggle="modal" 
                    data-bs-target="#modalDownload">
                <i class="fa-solid fa-file-excel"></i>
                Descargar
            </button>
            @include('elements.table_visita')
        </div>
        
    </div>
    @include('elements.modal_persona')
    @include('elements.modal_add_visitante')
    @include('elements.modal_resumen')
    @include('elements.modal_download_report')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            
           
            $('.btnAsistencia').click(function () {

                var token = $("meta[name='csrf-token']").attr("content");
                const idPersona = $(this).data("id");

                $.ajax({

                    url: "visitas",
                    type: "POST",
                    data: {
                        "idPersona": idPersona,
                        "_token": token,
                    },
                    success: function (res){
                        
                        alert(res.message);
                        window.location.href = "/";

                    }

                });
            });

            $('.btnDeleteVisita').click(function(){

                if (window.confirm("¿Desea eliminar el registro?")) {
                    const idVisita = $(this).data("id");
                    var token = $("meta[name='csrf-token']").attr("content");

                    $.ajax({

                    url: `visitas/${idVisita}`,
                    type: "DELETE",
                    data: {
                        "_token": token,
                    },
                    success: function (res){
                        
                        alert(res.message);
                        window.location.href = "/";

                    }

                    });

                }
                
            })

            $('#btn_download_report').click(function (e) {
                const token = $("meta[name='csrf-token']").attr("content");
                const fecha = $('#txtFecha').val();
                $.ajax({
                    type: "GET",
                    url: "visitas/download",
                    responseType: "blob",
                    data: {
                        "_token": token,
                        "fecha": fecha
                    },
                    success: function (response) { 
                        e.preventDefault();
                        window.location.href = `../../files/${ response }`;
                     }
                });
             })

            $('#AddVisitante').click(function() {
                const nombres = $("#txtNombres").val();
                const paterno = $("#txtApePaterno").val();
                const materno = $("#txtApeMaterno").val();
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "visitantes",
                    type: "POST",
                    data: {
                        "nombres": nombres,
                        "paterno": paterno,
                        "materno": materno,
                        "_token": token,
                    },
                    success: function (res){
                        alert(res.message);
                        if (res.status == 1) {
                            window.location.href = "/";
                        }
                        
                    }
                });
                
            })

          $('#visitas').DataTable({
                "order": [[ 3, "desc" ]],
            });
            $('#personas').DataTable();
            $('#resumen').DataTable({
                "order": [[ 1, "desc" ]],
            });
        });



    </script>
</body>
</html>