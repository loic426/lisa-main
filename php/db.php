<?php


$aConfig = json_decode( file_get_contents("../config.json"), true );
if ( is_null($aConfig) ) {
    throw new Exception("Erreur config.json, données incorrectes.", 1);
}    

try{
    $dsn = 'mysql:host='.$aConfig['host']. ';dbname='.$aConfig['dbname'];

    $pdo = new PDO($dsn, $aConfig['user'], $aConfig['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo 'connection failed: '.$e->getMessage();
}
?>