<?php

    class mySQL{
        var $host = 'localhost';
        var $username = 'root';
        var $password = '';
        var $database = 'scandiweb';
        public $conn;

        public function connect()
        {
           return $this->conn =new mysqli($this->host, $this->username, $this->password, $this->database);        
        }
    }

    