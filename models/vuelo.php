<?php
    class Vuelo extends Conectar{
        
        function get_vuelos(){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * from vuelo;";
            $sql = $conectar->prepare($sql);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function get_vuelo($id){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * from vuelo where cod_vuelo = ?;";
            $sql = $conectar->prepare($sql);
            $sql->bindvalue(1, $id);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function delete_vuelo($id){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "DELETE from vuelo where cod_vuelo = $id;";
            $sql = $conectar->prepare($sql);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function update_vuelo($id,$origen,$destino,$fechaVuelo,$cantidadPasajeros,$tipoAvion,$distancia){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE vuelo SET ciudad_origen = ?, ciudad_destino = ?,fecha_vuelo = ?, cantidad_pasajeros = ? ,tipo_avion = ? , distancia = ?
            where cod_vuelo = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindvalue(1, $origen);
            $sql->bindValue(2, $destino);
            $sql->bindValue(3, $fechaVuelo);
            $sql->bindvalue(4, $cantidadPasajeros);
            $sql->bindvalue(5, $tipoAvion);
            $sql->bindvalue(6, $distancia);
            $sql->bindvalue(7, $id);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function insert_vuelo($id,$origen,$destino,$fechaVuelo,$cantidadPasajeros,$tipoAvion,$distancia){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "INSERT INTO vuelo 
            VALUES(?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->bindValue(2, $origen);
            $sql->bindValue(3, $destino);
            $sql->bindValue(4, $fechaVuelo);
            $sql->bindValue(5, $cantidadPasajeros);
            $sql->bindValue(6, $tipoAvion);
            $sql->bindValue(7, $distancia);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>