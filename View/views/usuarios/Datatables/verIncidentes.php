<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DataTables</title>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../estilos.php">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!--*************1.12.4************-->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!--1.10.16-->


</head>

<!-- ESTRUCTURA Y DISEÑO DE LA TABLA -->
<body style="background-color:blue">
    <a style="color:white" href="../../Proveedor/index.php ">
        <h4><b>Salir</b></h4>
    </a>
    <div class="container" style="width:95%;background-color:white;border-radius:10px;margin-top:10%;">
        <h1><b>Lista de  Proveedores</b></h1><br>
        <table id="example" class="display" style="width:100%;color:black;margin-top:0%;">
            <thead>
                <tr>
                    <th>id Proveedor</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th>Accion</th>
                </tr>
            </thead>
            
        </table>
    </div>

<!--ESTRUCTURA PARA ALMACENAR DATOS A GESTIONAR-->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div id="content-data"></div>
        </div>

    </div>

<!--CODIGO ENCARGADO DE GUARDAR LOS DATOS EN LA ESTRUCTURA ANTERIOR-->
    <script>
        $(document).ready(function() {
            var dataTable = $('#example').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: "coneccion.php",
                    type: "post"
                }
            });
        });
    </script>


</body>

</html>

