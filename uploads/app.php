<?php
    require "../vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable("../")->load();
    $router = new \Bramus\Router\Router();
    use App\Connect;


    $router->mount('/persona', function() use($router){
        $router->get('',function(){
            $db= new Connect();
            $res= $db->con->prepare("SELECT * FROM persona");
            $res->execute();    
            $res = $res->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($res);
    
        });

        $router->get('/{nombre}',function($nombre){
            $db= new Connect();
            $res= $db->con->prepare("SELECT * FROM persona WHERE nombre LIKE :nombre");
            $res->bindValue('nombre',$nombre);
            $res->execute();    
            $res = $res->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($res);
    
        });

        $router->post('',function(){
            $db= new Connect();
            $_DATA=json_decode(file_get_contents("php://input"),true);
            $res= $db->con->prepare("INSERT INTO persona (nombre,apellido,apellidomadre,DNI) VALUES (:nombre,:apellido,:apellidomadre,:DNI)");
            $res->bindValue('nombre',$_DATA['nombre']);
            $res->bindValue('apellido',$_DATA['apellido']);
            $res->bindValue('apellidomadre',$_DATA['apellidomadre']);
            $res->bindValue('DNI',$_DATA['DNI']);
            $res->execute();    
            $res = $res->rowCount();
            echo json_encode($res);
    
        });

        
        $router->put('',function(){
            $db= new Connect();
            $_DATA=json_decode(file_get_contents("php://input"),true);
            $res= $db->con->prepare("UPDATE persona SET nombre=:nombre,apellido=:apellido,apellidomadre=:apellidomadre WHERE DNI=:DNI");
            $res->bindValue('nombre',$_DATA['nombre']);
            $res->bindValue('apellido',$_DATA['apellido']);
            $res->bindValue('apellidomadre',$_DATA['apellidomadre']);
            $res->bindValue('DNI',$_DATA['DNI']);
            $res->execute();    
            $res = $res->rowCount();
            echo json_encode($res);
    
        });

        $router->DELETE('',function(){
            $db= new Connect();
            $_DATA=json_decode(file_get_contents("php://input"),true);
            $res= $db->con->prepare("DELETE FROM persona WHERE DNI=:DNI");
            $res->bindValue('DNI',$_DATA['DNI']);
            $res->execute();    
            $res = $res->rowCount();
            echo json_encode($res);
    
        });
    });


    $router->run();
?>