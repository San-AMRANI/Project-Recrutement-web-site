<?php
    $host = 'localhost';
    $dbName = 'jobpply';
    $user = 'root';
    $pwd = '';
    $dsn = 'mysql:host=' . $host .';dbname=' . $dbName;
    // $dsn = "mysql:host=${host};dbname=${dbName}";
    
    try{
        echo 'hi';
        $pdo = new PDO($dsn, $user, $pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $pdo->query("SELECT * FROM offre");
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($result as $row) {
            // Access each column in the row
            foreach ($row as $key => $value) {
                echo "$key: $value<br>";
            }
            echo "<br>";
        }
        
        return $result;
        
    }catch(PDOException $e){
        echo 'hi';
        echo "<h2> Somthing went wrong, ERROR: {$e->getMessage()} </h2>";
        return false;
    }
?>