<?php

class Config {

    public $dbCon;

    public function __construct()
    {
        $this->dbCon = mysqli_connect('localhost', 'root', 'root', 'yumeneko');
    }

    public function getConnection(){
        return $this->dbCon;
    }

    public function close(){
        mysqli_close($this->dbCon);
        $this->dbCon = null;
    }
}