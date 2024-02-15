<?php
include_once 'config/config.php';
class Database{
    public $host = HOST;
    public $user = USER;
    public $password = PASSWORD;
    public $db = DATABASE;

    public $link;
    public $error;

    public function __construct(){
        $this->dbConnect();
    }

    public function dbConnect() {
        $this->link = mysqli_connect($this->host,$this->user, $this->password,$this->db);
        if (!$this->link) {
            $this->error = "DB Connection Failed!";
            return false;
        }
    }

    //insert
    public function insert($query){
        $result = mysqli_query($this->link,$query)or die($this->link->error.__LINE__);
        if ($result) {
            return $result;
        }else {
            return false;
        }
    }
}
?>