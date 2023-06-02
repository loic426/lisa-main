<?php

class Model
{
    private $table_definition = null;
    protected $dbh;

    protected $data = [];

    public function __construct( $aTableDefinition )
    {
        $this->table_definition = $aTableDefinition;
        $this->setDefault();

        $this->dbh = Database::connexion();
    }

    public function setDefault()
    {
        foreach ($this->table_definition as $sNomChamp => $aChamp) {
            $this->data[$sNomChamp] = $aChamp['default'];
        }
    }

    public function __get($sName)
    {
        if (! array_key_exists($sName, $this->table_definition )) {
            throw new \Exception(__CLASS__.": undefined property $sName", 1);
        }
  
        return($this->data[$sName]);
    }
  
    public function __set( $name, $value )
    {
        if ( ! array_key_exists($name, $this->table_definition) ) {
            throw new Exception(__CLASS__.": Le champ $name n'existe pas dans l'objet", 1);
        }

        if ( ! $this->validate( $name, $value ) ) {
            throw new Exception(__CLASS__.": Erreur mise à jour champ $name avec $value. Valeur invalide", 1);    
        }

        $this->data[$name] =  $value;        
    }

    public function validate( $name, $value )
    {
        $ValidFunction = $this->table_definition[$name]['valid'];
        $lValid = $ValidFunction($value);

        return($lValid);
    }

    public function toArray()
    {
        return($this->data);
    }

    public function toString()
    {
        return(json_encode($this->data));
    }

}
