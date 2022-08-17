<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}

?>
<?php require 'partesuperior.php'; ?>

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

<script>
function SoloNumeros(evt)
{
if(window.event){
keynum = evt.keyCode;
}
else{
keynum = evt.which;
}

if((keynum > 47 && keynum < 58) || keynum == 8 || keynum== 13)
{
return true;
}
else
{
Swal.fire({
  icon: 'error',
  title: 'Error',
  text: 'Solo puede Ingresar NUMEROS',
  
})
return false;
}
}

function SoloLetras(e)
{
key = e.keyCode || e.which;
tecla = String.fromCharCode(key).toString();
letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóú ";

especiales = [8,13];
tecla_especial = false
for(var i in especiales) {
if(key == especiales[i]){
 tecla_especial = true;
 break;
}
}

if(letras.indexOf(tecla) == -1 && !tecla_especial)
{
Swal.fire({
  icon: 'error',
  title: 'Error',
  text: 'Solo puede Ingresar LETRAS',
  
})
 return false;
}
}
</script>   
	<br>
	<br>
	<br>
	<br>
    <div class="container" style="width: 100%">

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
                        <input type="text" name="id" id="id" placeholder="Digite id" class="form-control" autofocus onkeypress="return SoloNumeros(event);">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre">Nombres:</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Digite sus nombres" class="form-control" autofocus onkeypress="return SoloLetras(event);" onKeyUP="this.value=this.value.toUpperCase();">
                    </div>
                    <div class="col-md-6">
                        <label for="telefono">Telefono:</label>
                        <input type="text" name="telefono" id="telefono" placeholder="Digite su telefono" class="form-control" onkeypress="return SoloNumeros(event);" onKeyUP="this.value=this.value.toUpperCase();">
                    </div>
                    </div>
                <div class="row">
                    <div class="col-md-6">
                    <label for="conjunto">Conjunto:</label>
                    <select name="conjunto" id="conjunto" class="form-control" >
                            <option value="">-Seleccione Conjunto-</option>
                            <option value="GORRION">GORRION</option>
                            <option value="GUACAMAYAS">GUACAMAYAS</option>
                            <option value="TUCAN">TUCAN</option>
                            <option value="TORCAZA">TORCAZA</option>
                            <option value="TORTOLA">TORTOLA</option>
                            <option value="GARZAS">GARZAS</option>
                            <option value="MIRLA">MIRLA</option>
                            <option value="CANARIO">CANARIO</option>
                            <option value="MONARCA">MONARCA</option>
                            <option value="MARIA MULATA">MARIA MULATA</option>
                    </select>
                            </div>
                    <div class="col-md-6">
                        <label for="torre_apto">Torre y apto:</label>
                        <input type="text" name="torre_apto" id="torre_apto" placeholder="Digite torre y apto" class="form-control" onKeyUP="this.value=this.value.toUpperCase();">
                    </div>
                </div>
            </div>
            <div class="container" style="width: 100%">
            <div class="row">
            	
                <div class="table-responsive">
                <table class="table table-sm table table-dark" id="tablaPersona">
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
<?php require 'parteinferior.php'; ?>