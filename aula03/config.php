<?php
$caminhoBanco = __DIR__ . "/aula03.db";

try {
    $con = new PDO("sqlite:" . $caminhoBanco);
    $con->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION  
    );
}catch(PDOException $e){
    http_response_code(500);
    exit;
}