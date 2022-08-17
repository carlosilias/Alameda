var url = "./../controlador/persona.controlador.php";

$(document).ready(function() {
    Consultar();
})

function Consultar() {
    $.ajax({
        data: { "accion": "CONSULTAR" },
        url: url,
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        var html = "";
        $.each(response, function(index, data) {
            html += "<tr>";
            html += "<td>" + data.id + "</td>";
            html += "<td>" + data.nombre + "</td>";
            html += "<td>" + data.telefono + "</td>";
            html += "<td>" + data.conjunto + "</td>";
            html += "<td>" + data.torre_apto + "</td>";
            html += "<td>";
            html += "<button class='btn btn-warning' onclick='ConsultarPorId(" + data.id + ");'><span class='fa fa-edit'></span> Modificar</button>"
            html += "<button class='btn btn-danger' onclick='Eliminar(" + data.id + ");'><span class='fa fa-trash'></span> Eliminar</button>"
            html += "</td>";
            html += "</tr>";
        });

        document.getElementById("datos").innerHTML = html;
        $('#tablaPersona').DataTable();
    }).fail(function(response) {
        console.log(response);
    });
}

function ConsultarPorId(id) {
    $.ajax({
        url: url,
        data: { "id": id, "accion": "CONSULTAR_ID" },
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        document.getElementById('nombre').value = response.nombre;
        document.getElementById('telefono').value = response.telefono;
        document.getElementById('conjunto').value = response.conjunto;
        document.getElementById('torre_apto').value = response.torre_apto;
        document.getElementById('id').value = response.id;
        BloquearBotones(false);
    }).fail(function(response) {
        console.log(response);
    });
}

function Guardar() {
    $.ajax({
        url: url,
        data: retornarDatos("GUARDAR"),
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        if (response == "OK") {
            MostrarAlerta("Éxito!", "Datos guardados con éxito", "success");
        } else {
            MostrarAlerta("Error!", response, "error");
        }
        Limpiar();
        Consultar();
    }).fail(function(response) {
        console.log(response);
    });
}

function Modificar() {
    $.ajax({
        url: url,
        data: retornarDatos("MODIFICAR"),
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        if (response == "OK") {
            MostrarAlerta("Éxito!", "Datos actualizados con éxito", "success");
        } else {
            MostrarAlerta("Error!", response, "error");
        }
        Limpiar();
        Consultar();
    }).fail(function(response) {
        console.log(response);
    });
}

function Eliminar(id) {
    $.ajax({
        url: url,
        data: { "id": id, "accion": "ELIMINAR" },
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        if (response == "OK") {
            MostrarAlerta("Éxito!", "Datos eliminados con éxito", "success");
        } else {
            MostrarAlerta("Error!", response, "error");
        }
        Consultar();
    }).fail(function(response) {
        console.log(response);
    });
}

function Validar() {
    id = document.getElementById('id').value;
    nombre = document.getElementById('nombre').value;
    nombre = document.getElementById('nombre').value;
    telefono = document.getElementById('telefono').value;
    conjunto = document.getElementById('conjunto').value;
    torre_apto = document.getElementById('torre_apto').value;
    

    if (id == "" || nombre == "" || telefono == "" || conjunto == "" ||
        torre_apto == "") {
        return false;
    }
    return true;
}

function retornarDatos(accion) {
    return {
        "nombre": document.getElementById('nombre').value,
        "telefono": document.getElementById('telefono').value,
        "conjunto": document.getElementById('conjunto').value,
        "torre_apto": document.getElementById('torre_apto').value,
        "accion": accion,
        "id": document.getElementById("id").value
    };
}

function Limpiar() {
    document.getElementById('id').value = "";
    document.getElementById('nombre').value = "";
    document.getElementById('telefono').value = "";
    document.getElementById('conjunto').value = "";
    document.getElementById('torre_apto').value = "";
    BloquearBotones(true);
}

function BloquearBotones(guardar) {
    if (guardar) {
        document.getElementById('guardar').disabled = false;
        document.getElementById('modificar').disabled = true;
    } else {
        document.getElementById('guardar').disabled = true;
        document.getElementById('modificar').disabled = false;
    }
}

function MostrarAlerta(titulo, descripcion, tipoAlerta) {
    Swal.fire(
        titulo,
        descripcion,
        tipoAlerta
    );
}