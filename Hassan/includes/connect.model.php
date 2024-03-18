<?php
$host = 'localhost';
$dbName = 'jobpply';
$user = 'root';
$pwd = '';
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;
// $dsn = "mysql:host=${host};dbname=${dbName}";
$pdo = new PDO($dsn, $user, $pwd);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::ERRMODE_EXCEPTION);

function executeQuery($sql)
{
    //database connection

    try {

        global $pdo;
        $stmt = $pdo->query($sql);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (PDOException $e) {
        echo "<h2> Somthing went wrong, ERROR: {$e->getMessage()} </h2>";
        return false;
    }
}
?>