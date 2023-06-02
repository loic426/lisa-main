<?php

class Database
{
    private static $instance = null;     // Singleton
    private static $dbh = null;     // Database connexion 
    private $configuration = array();
    
    private function __construct()
    {
        global $sBasepath;

        $aConfig = json_decode( file_get_contents($sBasepath."config.json"), true );
        if ( is_null($aConfig) ) {
            throw new Exception("Erreur config.json, données incorrectes.", 1);
        }    

        $this->configuration = $aConfig;
        $this->openDatabase();
    }
        
    public static function connexion()
    {
            
        if (is_null(self::$instance)) {
            self::$instance = new Database();  
        }
            
        return( self::$dbh );
    }
        
    private function openDatabase()
    {
        $sPDOConnectString = sprintf( "mysql:host=%s;dbname=%s;charset=utf8",
            $this->configuration['host'],
            $this->configuration['dbname'],
            );
        
        self::$dbh = new PDO(
            $sPDOConnectString, 
            $this->configuration['user'], 
            $this->configuration['password']
        );
        self::$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    
    public function __destruct() 
    {
        self::$dbh = null;
    }
    
}
