<?php 

include 'index.php';

require_once("autoload.php");

date_default_timezone_set('Europe/Paris');

if ( !isset($_SERVER['DOCUMENT_ROOT'])) {
    throw new \Exception("Fatal error: This application must be run in a web environnement.", 1);
}

$sBasepath=$_SERVER['DOCUMENT_ROOT'].'\\lisa-main\\';   // Chemin de la base de l'application avec un slash final

$promo = new PromotionModel();

echo html_head() . html_promo_ajout($promo->index()) . html_endbody();



function html_promo_ajout($aPromos)
{
/*
    $aPromos = array( 
        [ "id" => "1", "desc" => "BTS SN21" ],
        [ "id" => "2", "desc" => "BTS SN22" ],
    );
*/
    $html = <<<END
    <div class="container">
        <fieldset>
        <legend>Ajouter Promotion</legend>
            <div>
                <form action="test_promo.php" method="post">
                    <div class="row mb-3 mt-5">
                        <div class="col-5">
                            <input type="text" class="form-control" id="promot" name="promot" placeholder="Promotion">
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
            </div>
        </fieldset>
    </div>
END;

    return $html;

}


function html_head()
{
    
}

function html_endbody()
{
    
    
}    


