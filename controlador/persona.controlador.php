<?php

    require '../modelo/persona.modelo.php';

    if($_POST){
        $persona = new Persona();

        switch($_POST["accion"]){
            case "CONSULTAR":
                echo json_encode($persona->ConsultarTodo());
            break;
            case "CONSULTAR_ID":
                echo json_encode($persona->ConsultarPorId($_POST["id"]));
            break;
            case "GUARDAR":
                $id = $_POST["id"];
                $nombre = $_POST["nombre"];
                $telefono = $_POST["telefono"];
                $conjunto = $_POST["conjunto"];
                $torre_apto = $_POST["torre_apto"];
                
                if($id == ""){
                    echo json_encode("Debe ingresar id de la persona");
                    return;
                }

                if($nombre == ""){
                    echo json_encode("Debe ingresar los nombres de la persona");
                    return;
                }

                if($telefono == ""){
                    echo json_encode("Debe ingresar los telefono de la persona");
                    return;
                }

                if($conjunto == ""){
                    echo json_encode("Debe ingresar conjunto de la persona");
                    return;
                }

                if($torre_apto == ""){
                    echo json_encode("Debe ingresar apto de la persona");
                    return;
                }

                

                $respuesta = $persona->Guardar($id, $nombre, $telefono, $conjunto, $torre_apto);
                echo json_encode($respuesta);
            break;
            case "MODIFICAR":
                $nombre = $_POST["nombre"];
                $telefono = $_POST["telefono"];
                $conjunto = $_POST["conjunto"];
                $torre_apto = $_POST["torre_apto"];
                $id = $_POST["id"];

                if($id == ""){
                    echo json_encode("Debe ingresar id de la persona");
                    return;
                }
                if($nombre == ""){
                    echo json_encode("Debe ingresar los nombres de la persona");
                    return;
                }

                if($telefono == ""){
                    echo json_encode("Debe ingresar los telefono de la persona");
                    return;
                }

                if($conjunto == ""){
                    echo json_encode("Debe ingresar conjunto de la persona");
                    return;
                }

                if($torre_apto == ""){
                    echo json_encode("Debe ingresar apto de la persona");
                    return;
                }


                $respuesta = $persona->Modificar($id, $nombre, $telefono, $conjunto, $torre_apto);
                echo json_encode($respuesta);
            break;
            case "ELIMINAR":
                $id = $_POST["id"];
                $respuesta = $persona->Eliminar($id);
                echo json_encode($respuesta);
            break;
        }
    }

?>