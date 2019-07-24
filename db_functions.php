<?php
$pdo = new PDO('pgsql:host=pg.sweb.ru;port=5432;dbname=amarylliso', 'amarylliso', 'Mesina226');

class db
{
    function getUserIdNamePassByName($name)
    {
        global $pdo;
        $query = $pdo->prepare('SELECT id, name, passhash FROM users WHERE name = :name');
        $query->bindParam(':name', $name);
        $query->execute();
        return $query;
    }
}