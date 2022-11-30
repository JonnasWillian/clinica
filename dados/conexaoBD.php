<?php

$hostname = 'localhost';
$bd = 'forte722_funcionarios';
$usuario = 'root';
$senha = '123456';

function conectar($hostname,$bd,$usuario,$senha){

    global $mysql;
    $mysql = new mysqli($hostname, $usuario, $senha ,$bd );
    if($mysql->connect_errno){
        echo "Falha ao conectar: (". $mysql->connect_errno .")". $mysql->connect_errno;
    }

    if ($mysql){
        $db = mysqli_select_db($mysql, $bd) or die ("Ops! Infelizmente não consegui me conectar ao banco");
        if ($db){
            return $db;
        }
    }

};


    $mysql = new mysqli($hostname, $usuario, $senha ,$bd );
    if($mysql->connect_errno){
        echo "Falha ao conectar: (". $mysql->connect_errno .")". $mysql->connect_errno;
    }

    define('HOST', 'localhost');
    define('USER', 'forte722_func');
    define('PASS', 'forte722');
    define('DBSA', 'forte722_funcionarios');
