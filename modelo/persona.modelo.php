<?php

    require 'conexion.php';

    class Persona{

        public function ConsultarTodo(){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("SELECT * FROM cliente");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function ConsultarPorId($id){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("SELECT * FROM cliente where id = :id");
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function Guardar($id, $nombre, $telefono, $conjunto, $torre_apto){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("INSERT INTO `cliente`
                                                (`id`,
                                                `nombre`,
                                                `telefono`,
                                                `conjunto`,
                                                `torre_apto`)
                                    VALUES (:id,
                                            :nombre,
                                            :telefono,
                                            :conjunto,
                                            :torre_apto);");
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindValue(":telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindValue(":conjunto", $conjunto, PDO::PARAM_STR);
            $stmt->bindValue(":torre_apto", $torre_apto, PDO::PARAM_STR);
            

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al guardar la información";
            }

        }

        public function Modificar($id, $nombre, $telefono, $conjunto, $torre_apto){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("UPDATE `cliente`
                                        SET `nombre` = :nombre,
                                        `telefono` = :telefono,
                                        `conjunto` = :conjunto,
                                        `torre_apto` = :torre_apto
                                        WHERE `id` = :id;");
            $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindValue(":telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindValue(":conjunto", $conjunto, PDO::PARAM_STR);
            $stmt->bindValue(":torre_apto", $torre_apto, PDO::PARAM_STR);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al modificar la información";
            }

        }

        public function Eliminar($id){

            $conexion = new Conexion();
            $stmt = $conexion->prepare("DELETE FROM cliente WHERE id = :id");
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error: se ha generado un error al eliminar la información";
            }

        }

    }

?>