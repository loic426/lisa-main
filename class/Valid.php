<?php 

class Valid
{

    // Retourne toujours vrai
    public static function alwaysTrue( $val )
    {
        return(true);
    }
    
    // Controle si le parametre est une chaine, non vide et d'une longueur inférieure à $nLen
    public static function checkStr( $val )
    {
        if ( ! is_string($val) ) {
            throw new Exception("Erreur: parametre incorrect - type attendu: string");
        }

        return(true);
    }

    public static function checkEmail( $val )
    {
        if  ( 
            ! is_string($val) || 
            ( is_string($val) && !empty($val) && !filter_var($val, FILTER_VALIDATE_EMAIL) )
            ){
            throw new Exception("Erreur: parametre incorrect - type attendu: email");
        }

        return(true);
    }
    

    // Controle si le parametre est un identifiant valide (entier positif)
    public static function checkId( $val )
    {
        if (! is_int($val) || ( $val < 0 ) ) {
            throw new Exception("Erreur: parametre incorrect - attendu: entier positif");
        }

        return(true);
    }

    // Controle si le parametre est une date valide
    public static function checkDateTime( $val )
    {
        if ( ! date_create_from_format('Y-m-j H:i:s', $val) ) {
            throw new Exception("Erreur: parametre incorrect - attendu: datetime");
        }

        return(true);
    }

}