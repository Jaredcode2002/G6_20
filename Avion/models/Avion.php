<?php
    class Avion extends Conectar{
        
        function get_Aviones(){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * from avion;";
            $sql = $conectar->prepare($sql);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function get_avion($id){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * from avion where Numero_avion = ?;";
            $sql = $conectar->prepare($sql);
            $sql->bindvalue(1, $id);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function delete_avion($id){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "DELETE from avion where Numero_avion = $id;";
            $sql = $conectar->prepare($sql);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function update_avion($id,$tipo,$horasvuelo,$capacidadpasajeros,$primervuelo,$paisconstruccion,$cantidad){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE avion SET Tipo_Avion = ?, Horas_de_vuelo = ?, Capacidad_pasajeros = ?,Fecha_primer_vuelo = ? ,Pais_construcción = ? ,Cantidad_de_Vuelos  = ?
            where  Numero_avion = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindvalue(1, $tipo);
            $sql->bindValue(2, $horasvuelo);
            $sql->bindValue(3, $capacidadpasajeros);
            $sql->bindvalue(4, $primervuelo);
            $sql->bindvalue(5, $paisconstruccion);
            $sql->bindvalue(6, $cantidad);
            $sql->bindvalue(7, $id);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function insert_Avion($id,$tipo,$horasvuelo,$capacidadpasajeros,$paisconstruccion,$primervuelo,$cantidad){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "INSERT INTO avion 
            VALUES(?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->bindValue(2, $tipo);
            $sql->bindValue(3, $horasvuelo);
            $sql->bindValue(4, $capacidadpasajeros);
            $sql->bindValue(5, $paisconstruccion);
            $sql->bindValue(6, $primervuelo);
            $sql->bindValue(7, $cantidad);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>