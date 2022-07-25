<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }
    
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once("../../config/conexion.php");
    require_once("../models/vuelo.php");

    $vuelo = new vuelo();

    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET["op"]) {
        case "Vuelos":
            $datos = $vuelo->get_vuelos();
            echo json_encode($datos);
            break;
        
        case "Vuelo":
            $datos = $vuelo->get_vuelo($body["cod_vuelo"]);
            echo json_encode($datos);
            break;

        case "InsertVuelo":
            $datos = $vuelo->insert_vuelo($body["id"],$body["origen"],$body["destino"],$body["fechaVuelo"],$body["cantidadPasajeros"],$body["tipoAvion"],$body["distancia"]);
            print "Datos insertados";
            echo json_encode($datos);
            break; 

        case "DELVuelo":
            $datos = $vuelo->delete_vuelo($body["cod_vuelo"]);
            print "Datos Eliminados";
            echo json_encode($datos);
            break;      
           
        case "UPVuelo":
            $datos = $vuelo->update_vuelo($body["id"],$body["origen"],$body["destino"],$body["fechaVuelo"],$body["cantidadPasajeros"],$body["tipoAvion"],$body["distancia"]);
            print "Datos actualizados";
            echo json_encode($datos);
            break;

        default:
            print "API no encontrada o no existente...";
            break;
    }

?>