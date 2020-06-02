<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('REDIS_SERVER', '127.0.0.1');
define('REDIS_PORT', '6379');

class redisCacheProvider {
    private $connection = null;

    public function __construct($host, $port){
        if($this->connection===null){
            $this->connection = new Redis();
            $this->connection->connect($host, $port);
        }
    }

    Public function getConnection() {
        return $this->connection;
    }

    public function get($key){
        $result = false;
        if($this->getConnection()){
            $result = unserialize($this->getConnection()->get($key));
        }
        return $result;
    }
    public function set($key, $value, $time=300){
        if($this->getConnection()){
            $this->getConnection()->set($key, serialize($value), $time);
        }
    }

    public function del($key){
        if($this->getConnection()){
            $this->getConnection()->delete($key);
        }
    }

    public function clear(){
        if($this->getConnection()){
            $this->getConnection()->flushDB();
        }
    }
}

$rc = new redisCacheProvider(REDIS_SERVER, REDIS_PORT);

$rc->set('var', 'test');
var_dump($rc->get('var'));

$rc->set('var3', [
    'key1' => 1,
    'key2' => 2,
    'key3' => 9,
    'key4' => 8,
    'key5' => 7,
    'key6' => 6,
]);

print_r($rc->get('var3'));
