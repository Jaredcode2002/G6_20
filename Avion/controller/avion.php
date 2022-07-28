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
  require_once("../models/Avion.php");

    $Avion=new Avion();

    $body = json_decode(file_get_contents("php://input"),true);

    switch($_GET["op"]){
      case "Aviones":
      $datos=$Avion->get_Aviones();
      echo json_encode($datos);
     break;

     case "avion":
       $datos=$Avion->get_avion($body["id"]);
       echo json_encode($datos);
     break;

     case "InsertAvion":
       $datos=$Avion->insert_Avion($body["id"],$body["Tipo_avion"],$body["Horas_de_vuelo"],$body["Capacidad_pasajeros"],$body["Fecha_primer_vuelo"],$body["Pais_construcción"],$body["Cantidad_de_Vuelos"]);
       echo json_encode("Avion Agregado");
     break;

     case "UpdateAvion":
       $datos=$Avion->update_avion($body["id"],$body["Tipo_avion"],$body["Horas_de_vuelo"],$body["Capacidad_pasajeros"],$body["Fecha_primer_vuelo"],$body["Pais_construcción"],$body["Cantidad_de_Vuelos"]);
       echo json_encode("Avion Actualizado");
     break;

     case "DeleteAvion":
       $datos=$Avion->delete_avion($body["id"]);
       echo json_encode("Avion Eliminado");
     break;

    }  
?>