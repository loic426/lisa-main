<?php
// autoloader des classes
// Remarquer que l'autoloader utilise une fonction anomyme
// voir documentation https://www.php.net/manual/en/language.oop5.autoload.php

spl_autoload_register( function ($sClassname) {
    global $sBasepath;

  //  echo "Autoload class: " . $sClassname . PHP_EOL;
    
   // 

    if (!isset($sBasepath)) {
        throw new \Exception("Autoload: global \$sBasepath not defined", 1);
    }

    // Liste des dossiers où sont stockées les classes
    $aDirectoryList = [ 'class', 'model', 'view' ];

    $lLoaded = false;
    foreach ($aDirectoryList as $sDirectory) {
        $sFile = $sBasepath. $sDirectory.'\\'.$sClassname.'.php';
//        echo "Try $sFile\n";
        
//        var_dump(file_exists($sFile));

        if ( !$lLoaded && file_exists($sFile) ) {
            // Class file found
//            echo "Loading...\n";
            $lLoaded = true;
            require_once($sFile);
            break;
        }
    }


    if (! $lLoaded) {
        throw new \Exception("Autoload: Unable toto load class " . $sClassname, 1);
    }

} 
);