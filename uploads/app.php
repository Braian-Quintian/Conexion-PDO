<?php
    header("Access-Control-Allow-Origin: *");
    require "../vendor/autoload.php";
    $router = new \Bramus\Router\Router();
    $dotenv = Dotenv\Dotenv::createImmutable("../")->load();

    $router->get("/pais", function () {
        $conexion = new \App\connect();
        $res = $conexion->con->prepare("SELECT * FROM pais");
        $res->execute();
        $res = ($res->fetchAll(PDO::FETCH_ASSOC));
        echo json_encode($res);
    });
    
    $router->post("/pais", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $conexion = new \App\connect();
        $res = $conexion->con->prepare("INSERT INTO pais (nombrePais) VALUES (:NOMBREPAIS)");
        $res->bindValue("NOMBREPAIS", $_DATA["nombrePais"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->put("/pais", function () {
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $conexion = new \App\connect();
        $res = $conexion->con->prepare("UPDATE pais SET nombrePais = :nombrePais WHERE idPais = :idPais");
        $res->bindParam(':idPais', $_DATA['idPais']);
        $res->bindValue("nombrePais", $_DATA["nombrePais"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });
    

    $router->delete("/pais", function () {
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $conexion = new \App\connect();
        $res = $conexion->con->prepare("DELETE FROM pais WHERE idPais=:idPais");
        $res->bindValue("idPais", $_DATA["idPais"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->get("/departamento", function () {
        $conexion = new \App\connect();
        $res = $conexion->con->prepare("SELECT * FROM departamento");
        $res->execute();
        $res = ($res->fetchAll(PDO::FETCH_ASSOC));
        echo json_encode($res);
    });
    $router->post("/departamento", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $conexion = new \App\connect();
        $res = $conexion->con->prepare("INSERT INTO departamento (nombreDep,idPais) VALUES (:NOMBREDEP,:IDPAIS)");
        $res->bindValue("NOMBREDEP", $_DATA["nombreDep"]);
        $res->bindValue("IDPAIS", $_DATA["idPais"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->get("/region", function () {
        $conexion = new \App\connect();
        $res = $conexion->con->prepare("SELECT * FROM region");
        $res->execute();
        $res = ($res->fetchAll(PDO::FETCH_ASSOC));
        echo json_encode($res);
    });

    $router->run();