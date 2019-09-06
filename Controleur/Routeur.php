<?php

require_once 'Requete.php';
require_once 'Vue.php';
class Routeur {

    // Route une requête entrante : exécute l'action associée
    public function routerRequete() {
        try {
            // Fusion des paramètres GET et POST de la requête
            // je commente mon code
            $requete = new Requete(array_merge($_GET, $_POST));

            $controleur = $this->creerControleur($requete);
            $action = $this->creerAction($requete);

            $controleur->executerAction($action);
        }
        catch (Exception $e) {
            $this->gererErreur($e);
        }
    }

    // Crée le contrôleur approprié en fonction de la requête reçue
    private function creerControleur(Requete $requete) {
        $controleur = "Accueil";  // Contrôleur par défaut
        if ($requete->existeParametre('controleur')) {
            $controleur = $requete->getParametre('controleur');
            // Première lettre en majuscule
            $controleur = ucfirst(strtolower($controleur));
        }
        // Création du nom du fichier du contrôleur
        $classeControleur = "Controleur" . $controleur;
        $fichierControleur = "Controleur/" . $classeControleur . ".php";
        if (file_exists($fichierControleur)) {
            // Instanciation du contrôleur adapté à la requête
            require($fichierControleur);
            $controleur = new $classeControleur();
            $controleur->setRequete($requete);
            return $controleur;
        }
        else
            throw new Exception("Fichier '$fichierControleur' introuvable");
    }

    // Détermine l'action à exécuter en fonction de la requête reçue
    private function creerAction(Requete $requete)
    {
        $action = "index";  // Action par défaut
        if ($requete->existeParametre('action')) {
            $action = $requete->getParametre('action');
        }
        return $action;
    }
    // Gère une erreur d'exécution (exception)
    private function gererErreur(Exception $exception) {
        $vue = new Vue('erreur');
        $vue->generer(array('msgErreur' => $exception->getMessage()));
    }
}
