<?php
class Config{

    private $dbConnection;

    public function __construct()
    {
        $this->dbConnection = mysqli_connect('localhost', 'root', 'root', 'yumeneko');
    }

    public function getConnection(){
        return $this->dbConnection;
    }

    public function close(){
        mysqli_close($this->dbConnection);
        $this->dbConnection = null;
    }
}