<?php
    class Reserva extends Conectar{
        
        function get_Reservas(){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * from Reserva;";
            $sql = $conectar->prepare($sql);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function get_Reserva($NumerodeReservacion){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * from Reserva where NumerodeReservacion = ?;";
            $sql = $conectar->prepare($sql);
            $sql->bindvalue(1, $NumerodeReservacion);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function delete_Reserva($NumerodeReservacion){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "DELETE from Reserva where NumerodeReservacion = $NumerodeReservacion;";
            $sql = $conectar->prepare($sql);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function update_Reserva($NumerodeReservacion,$CodigodeVuelo,$CodigodePasajero,$NombrePasajero,$NombreDestino,$FechadeVuelo,$PrecioVuelo){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE Reserva SET CodigodeVuelo = ?, CodigodePasajero = ?,NombrePasajero = ?, NombreDestino = ? ,FechadeVuelo = ? , PrecioVuelo = ?
            where NumerodeReservacion = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $CodigodeVuelo);
            $sql->bindValue(2, $CodigodePasajero);
            $sql->bindValue(3, $NombrePasajero);
            $sql->bindValue(4, $NombreDestino);
            $sql->bindValue(5, $FechadeVuelo);
            $sql->bindValue(6, $PrecioVuelo);
            $sql->bindValue(7, $NumerodeReservacion);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function insert_Reserva($NumerodeReservacion,$CodigodeVuelo,$CodigodePasajero,$NombrePasajero,$NombreDestino,$FechadeVuelo,$PrecioVuelo){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "INSERT INTO Reserva
            VALUES(?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NumerodeReservacion);
            $sql->bindValue(2, $CodigodeVuelo);
            $sql->bindValue(3, $CodigodePasajero);
            $sql->bindValue(4, $NombrePasajero);
            $sql->bindValue(5, $NombreDestino);
            $sql->bindValue(6, $FechadeVuelo);
            $sql->bindValue(7, $PrecioVuelo);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>