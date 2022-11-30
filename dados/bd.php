<?php

$hostname = 'localhost';
$bd = 'forte722_funcionarios';
$usuario = 'root';
$senha = '123456';

$mysql = new mysqli($hostname, $usuario, $senha ,$bd );
if($mysql->connect_errno){
    echo "Falha ao conectar: (". $mysql->connect_errno .")". $mysql->connect_errno;
}

/*
$host = 'mysql:dbname=forte722_funcionarios;host=localhost;';
$user = 'root';
$pass = '123456';

try{
    $pdo = new PDO($host,$user,$pass);
} catch (PDOException $ex){
    echo "Error: " . $ex->getMessage();
}
*/
/*
class Banco
{
    private static $dbNome = 'forte722_funcionarios';
    private static $dbHost = 'localhost';
    private static $dbUsuario = 'root';
    private static $dbSenha = '123456';
    
    private static $cont = null;
    
    public function __construct() 
    {
        die('A função Init nao é permitido!');
    }
    
    public static function conectar()
    {
        if(null == self::$cont)
        {
            try
            {
                self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbNome, self::$dbUsuario, self::$dbSenha); 
            }
            catch(PDOException $exception)
            {
                die($exception->getMessage());
            }
        }
        return self::$cont;
    }
    
    public static function desconectar()
    {
        self::$cont = null;
    }
}
*/
