<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD PHP</title>

    <!--ESTILOS CSS BOOTSTRAP-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!--ESTILOS CSS ICONOS FONTAWESOME-->
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <!--ESTILOS Sweet Alert-->
    <link rel="stylesheet" href="../assets/plugins/SweetAlert/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">


</head>

<body>

    
    <div class="container">

        <div class="card">
            <div class="card-header bg-info">
                <h3 class="text-white">Gestionar Personas</h3>
            </div>
            <div class="card-body">
                

                <div class="row">
                    <div class="btn-group-sm">
                        <button class="btn btn-outline-info" onclick="Consultar();"><span class="fa fa-search"></span> Consultar</button>
                        <button class="btn btn-outline-info" id="guardar" onclick="Guardar();"><span class="fa fa-save"></span> Guardar</button>
                        <button class="btn btn-outline-info" id="modificar" onclick="Modificar();" disabled="true"><span class="fa fa-pencil-alt"></span> Modificar</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="id">Id:</label>
                        <input type="text" name="id" id="id" placeholder="Por favor digite sus id" class="form-control" autofocus>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre">Nombres:</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Por favor digite sus nombres" class="form-control" autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="telefono">telefono:</label>
                        <input type="text" name="telefono" id="telefono" placeholder="Por favor digite sus telefono" class="form-control">
                    </div>
                    </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-single-default" class="form-label font-size-13 text-muted">Default</label>
                                                        <select class="form-control" data-trigger name="choices-single-default"
                                                            id="choices-single-default"
                                                            placeholder="This is a search placeholder">
                                                            <option value="">This is a placeholder</option>
                                                            <option value="Choice 1">Choice 1</option>
                                                            <option value="Choice 2">Choice 2</option>
                                                            <option value="Choice 3">Choice 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                    <div class="col-md-6">
                        <label for="torre_apto">Torre y apto:</label>
                        <input type="text" name="torre_apto" id="torre_apto" placeholder="Por favor digite su dirección" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <table class="table table-dark table-striped" id="tablaPersona">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombres</th>
                            <th>Telefono</th>
                            <th>Conjunto</th>
                            <th>Torre y apto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="datos">

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
<!-- JAVASCRIPT -->
<script src="../assets/js/all.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="../js/persona.js"></script>
<script src="../assets/plugins/SweetAlert/dist/sweetalert2.all.min.js"></script>


</html>