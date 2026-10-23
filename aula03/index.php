<?php
require "config.php";

$rota = $_GET["rota"] ?? "teste";

function listarClientes($con){
    $stm = $con->query("SELECT * FROM Clientes");
    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));  
}
function listarResumo($con){
    $sql = "SELECT nome, sobrenome FROM Clientes";
    $stm = $con->query($sql);
    echo json_encode($stm ->fetchAll(PDO::FETCH_ASSOC));
}
function listarMaisNovo($con){
    $stm = $con->query("SELECT * FROM Clientes ORDER BY nascimento DESC LIMIT 1 ");
    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));  
}
function listarTotal($con){
    $stm = $con->query("SELECT COUNT(*) FROM Clientes");
    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));  
}
switch($rota){
    case "cliente": listarClientes($con); break;
    case "resumo" : listarResumo($con); break;
    case "novo"   : listarMaisNovo($con); break;
    case "contagem" : listarTotal($con); break;
    default: echo "Testee";
}
//ATIVIDADE
//Criar mais 2 funções: listarMaisNovo e listarTotal
//Query
//listarMaisNovo - $rota "novo":
// SELECT * FROM Clientes ORDER BY nascimento DESC LIMIT 1
//listarTotal - $rota "contagem":
//SELECT COUNT(*) FROM Cliente