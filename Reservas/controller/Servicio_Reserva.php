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
    require_once("../models/Servicio_Reserva.php");

    $Reserva = new Reserva();

    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET["opc"]) {
        case "GetReservas":
            $datos = $Reserva->get_Reservas();
            echo json_encode($datos);
            break;
        
        case "GetReserva":
            $datos = $Reserva->get_Reserva($body["NumerodeReservacion"]);
            if ($datos == null) {
                print "Reserva no existe.";
            }else{
                echo json_encode($datos);
            }
            break;

        case "InsertReserva":
            $datos = $Reserva->insert_Reserva($body["NumerodeReservacion"],$body["CodigodeVuelo"],$body["CodigodePasajero"],$body["NombrePasajero"],$body["NombreDestino"],$body["FechadeVuelo"],$body["PrecioVuelo"]);
            print "Reserva agregado con exito!";
            echo json_encode($datos);
            break; 

        case "DeleteReserva":
            $datos = $Reserva->delete_Reserva($body["NumerodeReservacion"]);
            print "Reserva eliminado con exito!";
            break;      
           
        case "UpdateReserva":
            $datos = $Reserva->update_Reserva($body["NumerodeReservacion"],$body["CodigodeVuelo"],$body["CodigodePasajero"],$body["NombrePasajero"],$body["NombreDestino"],$body["FechadeVuelo"],$body["PrecioVuelo"]);
                print "Reserva actualizado con exito";
                
            break;

        default:
            print "El API que consulta no se encontró o no existe...";
            break;
    }
  
?>