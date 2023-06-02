<?php 

include 'index.php';

require_once("autoload.php");

date_default_timezone_set('Europe/Paris');

if ( !isset($_SERVER['DOCUMENT_ROOT'])) {
    throw new \Exception("Fatal error: This application must be run in a web environnement.", 1);
}

$sBasepath=$_SERVER['DOCUMENT_ROOT'].'\\lisa-main\\';   // Chemin de la base de l'application avec un slash final

$promo = new PromotionModel();

echo html_head() . html_eleve_ajout($promo->index()) . html_endbody();



function html_eleve_ajout($aPromos)
{
/*
    $aPromos = array( 
        [ "id" => "1", "desc" => "BTS SN21" ],
        [ "id" => "2", "desc" => "BTS SN22" ],
    );
*/
    $page = <<<END
        
    <div class="container">
    <fieldset>
    <legend>Ajouter Évènement</legend>
        <div>
        <form action="test_evenement.php" method="post">
            <div class="row mb-3 mt-5">
        <div class="col-5">
            <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre" required>
        </div>
        <div class="col"></div>
        </div>

        <div class="row mb-3">
        <div class="col-5">
            <input type="text" class="form-control" id="evenement" name="evenement" placeholder="Evenement" required>
        </div>
        <div class="col"></div>
        </div>

        <div class="row mb-3">
        <div class="col-5">
            <input type="date" class="form-control" id="date_debut" name="date_debut" placeholder="Date de début" required>
        </div>
        <div class="col"></div>
        </div>

        <div class="row mb-3">
        <div class="col-5">
            <input type="date" class="form-control" id="date_fin" name="date_fin" placeholder="Date de fin">
        </div>
        <div class="col"></div>
        </div>
        <div class="row mb-3">
        <div class="col-5">
            <input type="time" class="form-control" id="heure_debut" name="heure_debut" placeholder="Heure de début" required>
        </div>
        <div class="col"></div>
        </div>
        <div class="row mb-3">
        <div class="col-5">
            <input type="time" class="form-control" id="heure_fin" name="heure_fin" placeholder="Heure de fin" required>
        </div>
        <div class="col"></div>
        </div>
        <div class="row mb-3">
        <div class="col-5">
            <input type="text" class="form-control" id="salle" name="salle" placeholder="Salle">
        </div>
        <div class="col"></div>
        </div>
        <div class="row mb-3">
        <div class="col-5">
            <input type="text" class="form-control" id="lieu" name="lieu" placeholder="Lieu" required>
        </div>
        <div class="col"></div>
        </div>
        <div class="row mb-3">
            <div class="col-2">
            </div>
            <div class="col-5">
            <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
            <div class="col"></div>
        </div>
        </form>
    </fieldset>
</div>    
      
END;


    return $page;

}

function html_select_promo( $aPromos )
{

}


function html_head()
{
    
}

function html_endbody()
{
    
    
}    


