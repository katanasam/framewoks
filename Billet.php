<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04/09/2019
 * Time: 16:24
 */
require 'Modele.php';

try {
    if (isset($_GET['id'])) {
        // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
        $id = intval($_GET['id']);
        if ($id != 0) {
            $billet = getBillet($id);
            $commentaires = getCommentaires($id);
            require 'vueBillet.php';
        }
        else
            throw new Exception("Identifiant de billet incorrect");
    }
    else
        throw new Exception("Aucun identifiant de billet");
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}