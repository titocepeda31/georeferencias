<?php

class db
{

    private $dbHost = '172.16.238.10';
    private $dbUser = 'root';
    private $dbPass = 'nokia,.1979';
    private $dbName = 'georeferencias';

    private $con;
    public function dbConector()
    {
        $this->con = new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
        if ($this->con->connect_error) {
            die("Error al conectar: " .  $this->con->connect_error);
        }
        $this->con->set_charset("utf8");
        return  $this->con;
    }
}
