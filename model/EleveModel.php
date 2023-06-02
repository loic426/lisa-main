<?php 

class EleveModel extends Model
{
    const LISTE_CHAMPS = [
        'id' => [ 
            'valid' => 'Valid::checkId',
            'default' => 0,
            'pdo_type' => PDO::PARAM_INT
        ],
        'id_promotion' => [ 
            'valid' => 'Valid::checkId',
            'default' => 0,
            'pdo_type' => PDO::PARAM_INT
        ],
        'id_photo' => [ 
            'valid' => 'Valid::checkId',
            'default' => 0,
            'pdo_type' => PDO::PARAM_INT
        ],
        'nom' => [ 
            'valid' => 'Valid::checkStr',
            'default' => "",
            'pdo_type' => PDO::PARAM_STR
        ],
       'prenom' => [ 
        'valid' => 'Valid::checkStr',
        'default' => "",
        'pdo_type' => PDO::PARAM_STR
       ],
       'email' => [ 
        'valid' => 'Valid::checkEmail',
        'default' => "",
        'pdo_type' => PDO::PARAM_STR
       ],
       'mdp' => [ 
        'valid' => 'Valid::checkStr',
        'default' => "",
        'pdo_type' => PDO::PARAM_STR
       ],
];    

//    const QUERY_FIND = "SELECT * FROM device WHERE api_key = :api_key"; 
    const QUERY_INDEX = "SELECT * FROM eleve"; 
    const QUERY_CREATE = "INSERT INTO eleve(id_promotion, id_photo, nom, prenom, email, mdp) VALUES (:id_promotion, :id_photo, :nom, :prenom, :email, md5(:mdp))"; 

    public function __construct( )
    {
        parent::__construct( self::LISTE_CHAMPS );
    }



    function create() 
    {
            $stmt = $this->dbh->prepare( self::QUERY_CREATE );
            if (
                $stmt !== false &&
                $stmt->bindValue(':id_promotion', $this->id_promotion, PDO::PARAM_INT) &&
                $stmt->bindValue(':id_photo', $this->id_photo, PDO::PARAM_INT) &&
                $stmt->bindValue(':nom', $this->nom, PDO::PARAM_STR) &&
                $stmt->bindValue(':prenom', $this->prenom, PDO::PARAM_STR) &&
                $stmt->bindValue(':email', $this->email, PDO::PARAM_STR) &&
                $stmt->bindValue(':mdp', $this->mdp, PDO::PARAM_STR) &&
                $stmt->execute()
            ) {
                $this->id = intVal( $this->dbh->lastInsertId() ); 
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
