<?php
class ConnectDB{
    public static function setConnect(){
        return new PDO('mysql:host=localhost;dbname=test1','root','',[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
}
$connect = ConnectDB::setConnect();
$query = $connect->query('SELECT * FROM user');
$result = $query->fetchAll();

var_dump($result);

print_r('test SSH connect with github'); 