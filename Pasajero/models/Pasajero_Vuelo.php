<?php
    class Pasajero extends Conectar{
        
        function get_pasajeros(){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * from pasajero;";
            $sql = $conectar->prepare($sql);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function get_pasajero($CodigoPasajero){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * from pasajero where CodigoPasajero = ?;";
            $sql = $conectar->prepare($sql);
            $sql->bindvalue(1, $CodigoPasajero);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function delete_pasajero($CodigoPasajero){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "DELETE from pasajero where CodigoPasajero = $CodigoPasajero;";
            $sql = $conectar->prepare($sql);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function update_pasajero($CodigoPasajero,$Nombres,$Apellidos,$FechaDeRegistro,$Nacionalidad,$NumeroTelefonico,$Email){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE pasajero SET Nombres = ?, Apellidos = ?,FechaDeRegistro = ?, Nacionalidad = ? ,NumeroTelefonico = ? , Email = ?
            where CodigoPasajero = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Nombres);
            $sql->bindValue(2, $Apellidos);
            $sql->bindValue(3, $FechaDeRegistro);
            $sql->bindValue(4, $Nacionalidad);
            $sql->bindValue(5, $NumeroTelefonico);
            $sql->bindValue(6, $Email);
            $sql->bindValue(7, $CodigoPasajero);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function insert_pasajero($CodigoPasajero,$Nombres,$Apellidos,$FechaDeRegistro,$Nacionalidad,$NumeroTelefonico,$Email){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "INSERT INTO pasajero 
            VALUES(?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $CodigoPasajero);
            $sql->bindValue(2, $Nombres);
            $sql->bindValue(3, $Apellidos);
            $sql->bindValue(4, $FechaDeRegistro);
            $sql->bindValue(5, $Nacionalidad);
            $sql->bindValue(6, $NumeroTelefonico);
            $sql->bindValue(7, $Email);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>