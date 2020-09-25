<?php
trait Singletone{
    private static $instance = null;
    private function __constructor(){}
    private function __clone (){}
    private function __wakeup (){}

    public static function getInstance(){
        if (self::$instance == null){
            return self::$instance = new self();
        } else {
            return self::$instance;
        }
    }
}

class ConnectDB{

    use Singletone;
 
    public function setConnect(){
        return new PDO('mysql:host=localhost;dbname=test1','root','',[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
}
$connect = ConnectDB::getInstance();
$conn = $connect->setConnect();
$query = $conn->query('SELECT * FROM user');
$result = $query->fetchAll();

var_dump($result);

print_r('test SSH connect with github'); 