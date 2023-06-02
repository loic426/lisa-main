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
    $page_template = <<<END
        <div class="container">
        <fieldset>
        <legend>Ajouter élève</legend>

        <form action="test_eleve.php" method="post">

            <div class="row mb-3 mt-5">
            <div class="col-5">
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
            </div>
            <div class="col"></div>
            </div>

            <div class="row mb-3">
            <div class="col-5">
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom">
            </div>
            <div class="col"></div>
            </div>

            <div class="row mb-3">
            <div class="col-5">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="col"></div>
            </div>

            <div class="row mb-3">
            <div class="col-5">
                <input type="password" class="form-control" id="password" name="password" minlength="12" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" >
            </div>
            <div class="col"></div>
            </div>

            <div class="row mb-3">
            <div class="col-5">
                %s
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

    $page = sprintf($page_template, html_select_promo( $aPromos ));

    return $page;

}

function html_select_promo( $aPromos )
{


    $html = <<<END
    <select class="form-select" name="promotion" id="promotion">
    <option selected>Choisir une promotion</option>
END;

    $select_template_line = PHP_EOL.'<option value="%s">%s</option>'.PHP_EOL;

    foreach($aPromos as $aPromo) {
//        print_r($aPromo);
        $html .= sprintf($select_template_line, $aPromo['id'], $aPromo['nom']);
    }


    $html .= "</select>".PHP_EOL;

    return($html);    
}


function html_head()
{
    
}

function html_endbody()
{
    
    
}    


