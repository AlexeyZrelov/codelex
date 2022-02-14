<?php

class Dbh
{
    protected function connect()
    {
        try {
            $username = "root";
            $password = "root1234";
            $dbh = new PDO('mysql:host=localhost;dbname=ooplogin', $username, $password);
            return $dbh;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}