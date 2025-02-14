<?php 

require(__DIR__."/config.php");

class Conexao {
    private static $con = null;

    public static function getConexao(){
        if(self::$con == null) {
            try {
                $opcoes = array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
            
            $strCon= "mysql:=host" . DB_HOST . ";dbname=" . DB_NAME;
            self::$con = new PDO($strCon, DB_USER, DB_PASSWORD, $opcoes);
            } catch(PDOException $e) {
                echo "Erro ao conectar na base de dados. <br>";
                print_r($e);
            }
        }
        return self::$con;
    }
}