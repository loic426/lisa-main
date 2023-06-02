<?php 

class PromotionModel extends Model
{
    const LISTE_CHAMPS = [
        'id' => [ 
            'valid' => 'Valid::checkId',
            'default' => 0,
            'pdo_type' => PDO::PARAM_INT
        ],
        'nom' => [ 
            'valid' => 'Valid::checkStr',
            'default' => "",
            'pdo_type' => PDO::PARAM_STR
       ]
    ];    

//    const QUERY_FIND = "SELECT * FROM device WHERE api_key = :api_key"; 
    const QUERY_INDEX = "SELECT * FROM promotion"; 
    const QUERY_CREATE = "INSERT INTO promotion(nom) VALUES (:nom)"; 

    public function __construct( )
    {
        parent::__construct( self::LISTE_CHAMPS );
    }

    function create() 
    {
//        if ( $this->validate('api_key', $api_key) ) {
            $stmt = $this->dbh->prepare( self::QUERY_CREATE );
            if (
                $stmt !== false &&
                $stmt->bindValue(':nom', $this->nom, PDO::PARAM_STR) &&
                $stmt->execute()
            ) {
                $this->id = intVal( $this->dbh->lastInsertId() ); 
            }
//        }

        //return $aRow;
    }

    function index() 
    {
//        if ( $this->validate('api_key', $api_key) ) {
            $stmt = $this->dbh->prepare( self::QUERY_INDEX );
            if (
                $stmt !== false &&
                $stmt->execute()
            ) {
                $aRow = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            }
//        }

        return $aRow;
    }

}