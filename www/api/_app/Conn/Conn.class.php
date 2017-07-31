<?php
class Conn {
    private static $Host = HOST;
    private static $User = USER;
    private static $Pass = PASS;
    private static $Dbsa = DBSA;
    
    private static $Connect = null;
    //Conecta ao banco de dados
    private static function Conectar() {
        try {
            if (self::$Connect == null):
                $dsn = 'mysql:host=' . self::$Host . ';dbname=' . self::$Dbsa;
                $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
                self::$Connect = new PDO($dsn, self::$User, self::$Pass, $options);
            endif;
        } catch (PDOException $e) {
            PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            die;
        }
        self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$Connect;
    }

    //Retorna o objeto de conexao
    public static function getConn(){
        return self::Conectar();
    }
    
    
}
