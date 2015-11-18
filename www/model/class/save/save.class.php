<?php

class Save {

    public $PDOInstance;
    const DSN = 'mysql:dbname=utopia;host=127.0.0.1';
    const USER = 'root';
    const PASSWORD = '';

    public function __construct() {

        $dbh = null;
        try {
            $dbh = new PDO(self::DSN, self::USER, self::PASSWORD);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
        $this->PDOInstance = $dbh;
    }

    public function select($request) {
        if(preg_match('/SELECT/', $request)) {
            $query = $this->PDOInstance->prepare($request);
            $query->execute();
            if($query->errorCode() == '00000') {
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                return print_r($results);
            } else {
                return $query->errorCode();
            }
        }
        else {
            $this->PDOInstance->rollBack();
            return 'Format de requête SELECT non valable';
        }
    }

    public function insert($request) {
        if(preg_match('/INSERT/', $request)) {
            $query = $this->PDOInstance->prepare($request);
            $query->execute();
            if($query->errorCode() != '00000') {
                return $query->errorCode();
            }
        }
        else {
            $this->PDOInstance->rollBack();
            return 'Format de requête INSERT non valable';
        }
    }

    public function update($request) {
        if(preg_match('/UPDATE/', $request , $matches)) {
            $query = $this->PDOInstance->prepare($request);
            $query->execute();
            if($query->errorCode() != '00000') {
                return $query->errorCode();
            }
        }
        else {
            $this->PDOInstance->rollBack();
            return 'Format de requête UPDATE non valable';
        }
    }

    public function delete($request) {
        if(preg_match('/DELETE/', $request , $matches)) {
            $query = $this->PDOInstance->prepare($request);
            $query->execute();
            if($query->errorCode() != '00000') {
                return $query->errorCode();
            }
        }
        else {
            $this->PDOInstance->rollBack();
            return 'Format de requête DELETE non valable';
        }
    }
}