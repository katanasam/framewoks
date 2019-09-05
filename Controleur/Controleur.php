<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04/09/2019
 * Time: 17:23
 */


require __DIR__.'/../Modele/BIllet.php';
require __DIR__.'/../Modele/Commentaire.php';


// Affiche la liste de tous les billets du blog
function accueil() {
    $obj_billets = new Billet();
    // return un ensemble de billets
   echo var_dump($billets =$obj_billets->getBillets());
    require __DIR__.'/../Vue/vueAccueil.php';
}

// Affiche les détails sur un billet
function billet($idBillet) {
    $obj_billet = new Billet();
    // retourne un seule billet
    $billet= $obj_billet->getBillet($idBillet);

    $commentaires = new Commentaire();
    $commentaires->getCommentaires($idBillet);
    require __DIR__.'/../Vue/vueBillet.php';
}

// Affiche une erreur
function erreur($msgErreur) {
    require __DIR__.'/../Vue/vueErreur.php';
}