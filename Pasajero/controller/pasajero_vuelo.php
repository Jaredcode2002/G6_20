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
    require_once("../models/Pasajero_Vuelo.php");

    $Pasajero = new Pasajero();

    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET["opc"]) {
        case "GetPasajeros":
            $datos = $Pasajero->get_pasajeros();
            echo json_encode($datos);
            break;
        
        case "GetPasajero":
            $datos = $Pasajero->get_pasajero($body["CodigoPasajero"]);
            if ($datos == null) {
                print "El pasajero no existe.";
            }else{
                echo json_encode($datos);
            }
            break;

        case "InsertPasajero":
            $datos = $Pasajero->insert_pasajero($body["CodigoPasajero"],$body["Nombres"],$body["Apellidos"],$body["FechaDeRegistro"],$body["Nacionalidad"],$body["NumeroTelefonico"],$body["Email"]);
            print "Pasajero agregado con exito!";
            echo json_encode($datos);
            break; 

        case "DeletePasajero":
            $datos = $Pasajero->delete_pasajero($body["CodigoPasajero"]);
            print "Pasajero eliminado con exito!";
            break;      
           
        case "UpdatePasajero":
            $datos = $Pasajero->update_pasajero($body["CodigoPasajero"],$body["Nombres"],$body["Apellidos"],$body["FechaDeRegistro"],$body["Nacionalidad"],$body["NumeroTelefonico"],$body["Email"]);
                print "Pasajero actualizado con exito";
                
            break;

        default:
            print "El API que consulta no se encontró o no existe...";
            break;
    }
  
?>