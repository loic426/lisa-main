<?php

class EvenementModel extends Model
{
    const LISTE_CHAMPS = [
        'titre' => [ 
            'valid' => 'Valid::checkStr',
            'default' => 0,
            'pdo_type' => PDO::PARAM_STR
        ],
        'evenement' => [ 
            'valid' => 'Valid::checkStr',
            'default' => "",
            'pdo_type' => PDO::PARAM_STR
        ],
       'date_debut' => [ 
        'valid' => 'Valid::checkStr',
        'default' => "",
        'pdo_type' => PDO::PARAM_STR
       ],
       'date_fin' => [ 
        'valid' => 'Valid::checkStr',
        'default' => "",
        'pdo_type' => PDO::PARAM_STR
       ],
       'heure_debut' => [ 
        'valid' => 'Valid::checkStr',
        'default' => "",
        'pdo_type' => PDO::PARAM_STR
       ],
       'heure_fin' => [ 
        'valid' => 'Valid::checkStr',
        'default' => "",
        'pdo_type' => PDO::PARAM_STR
       ],
       'salle' => [ 
        'valid' => 'Valid::checkStr',
        'default' => "",
        'pdo_type' => PDO::PARAM_STR
       ],
       'lieu' => [ 
        'valid' => 'Valid::checkStr',
        'default' => "",
        'pdo_type' => PDO::PARAM_STR
       ],
];    

//    const QUERY_FIND = "SELECT * FROM device WHERE api_key = :api_key"; 
    const QUERY_INDEX = "SELECT * FROM evenement"; 
    const QUERY_CREATE = "INSERT INTO evenement(titre, evenement, date_debut, date_fin, heure_debut, heure_fin, salle, lieu) VALUES (:titre, :evenement, :date_debut, :date_fin, :heure_debut, :heure_fin, :salle, :lieu)"; 

    public function __construct( )
    {
        parent::__construct( self::LISTE_CHAMPS );
    }



    function create() 
    {
            $stmt = $this->dbh->prepare( self::QUERY_CREATE );
            if (
                $stmt !== false &&
                $stmt->bindValue(':titre', $this->titre, PDO::PARAM_STR) &&
                $stmt->bindValue(':evenement', $this->evenement, PDO::PARAM_STR) &&
                $stmt->bindValue(':date_debut', $this->date_debut, PDO::PARAM_STR) &&
                $stmt->bindValue(':date_fin', $this->date_fin, PDO::PARAM_STR) &&
                $stmt->bindValue(':heure_debut', $this->heure_debut, PDO::PARAM_STR) &&
                $stmt->bindValue(':heure_fin', $this->heure_fin, PDO::PARAM_STR) &&
                $stmt->bindValue(':salle', $this->salle, PDO::PARAM_STR) &&
                $stmt->bindValue(':lieu', $this->lieu, PDO::PARAM_STR) &&

                $stmt->execute()
            ) {
//                $this->id = intVal( $this->dbh->lastInsertId() ); 
            }
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
