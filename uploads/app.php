<?php
    require "../vendor/autoload.php";
    $router = new \Bramus\Router\Router();
    $dotenv = Dotenv\Dotenv::createImmutable("../")->load();
    

    // TABLA academic_area ////////////////////////////////////
    $router->get("/academic_area", function(){
        $conexion = new \App\connect();
        $res = $conexion->con->prepare("SELECT * FROM academic_area");
        $res->execute();
        $res = ($res->fetchAll(PDO::FETCH_ASSOC));
        echo json_encode($res);
    });

    $router->post("/academic_area", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $conexion = new \App\connect();
        $res = $conexion->con->prepare("INSERT INTO academic_area (id_area,id_staff,id_position,id_journey) VALUES (:ID_AREA,:ID_STAFF,:ID_POSITION,:ID_JOURNEY)");
        $res->bindValue("ID_AREA", $_DATA["id_area"]);
        $res->bindValue("ID_STAFF", $_DATA["id_staff"]);
        $res->bindValue("ID_POSITION", $_DATA["id_position"]);
        $res->bindValue("ID_JOURNEY", $_DATA["id_journey"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });



    $router->get("/areas", function(){
        $conexion = new \App\connect();
        $res = $conexion->con->prepare("SELECT * FROM areas");
        $res->execute();
        $res = ($res->fetchAll(PDO::FETCH_ASSOC));
        echo json_encode($res);
    });

    $router->post("/areas", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $conexion = new \App\connect();
        $res = $conexion->con->prepare("INSERT INTO areas (name_area) VALUES (:NAME_AREA)");
        $res->bindValue("NAME_AREA", $_DATA["name_area"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });























    // $router->put("/camper", function(){
    //     $_DATA = json_decode(file_get_contents("php://input"), true);
    //     $conexion = new \App\connect();
    //     $res = $conexion->con->prepare("UPDATE tb_camper SET nombre = :NOMBRE,edad = :EDAD WHERE id=:CEDULA");
    //     $res->bindValue("CEDULA", $_DATA["id"]);
    //     $res->bindValue("NOMBRE", $_DATA["name"]);
    //     $res->bindValue("EDAD", $_DATA["age"]);
        
    //     $res->execute();
    //     $res = $res->rowCount();
    //     echo json_encode($res);
    // });
    // $router->delete("/camper",function (){
    //     $_DATA = json_decode(file_get_contents("php://input"),true);
    //     $conexion = new \App\connect();
    //     $res = $conexion->con->prepare("DELETE FROM tb_camper  WHERE id=:ID");
    //     $res->bindValue("ID",$_DATA["id"]);

    //     $res->execute();
    //     $res = $res->rowCount();
    //     echo json_encode($res);
    // });

    $router->run();