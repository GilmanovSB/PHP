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


class QueryBilder extends ConnectDB{

    public function getAll(){
        $db = $this->setConnect()->query('SELECT * FROM user');
        return $db->fetchAll();
    }
    
    public function entryBd($table, $name, $email){
        $db = $this->setConnect()->prepare("INSERT INTO $table (name, email) VALUES (:name, :email)");
        $db->execute(array(':name'=> $name, ':email'=> $email));
    }
}



$obj = new QueryBilder();
$result = $obj->getAll();
$obj->entryBd('user', 'Sergey', 'sergey@example.com');
var_dump($result);

print_r('test SSH connect with github'); 