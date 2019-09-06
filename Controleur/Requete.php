<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 06/09/2019
 * Time: 14:59
 */

class Requete
{
    // paramètres de la requête
    private $parametres;

    public function __construct($parametres) {
        $this->parametres = $parametres;
    }

    // Renvoie vrai si le paramètre existe dans la requête
    public function existeParametre($nom) {
        return (isset($this->parametres[$nom]) && $this->parametres[$nom] != "");
    }

    // Renvoie la valeur du paramètre demandé
    // Lève une exception si le paramètre est introuvable
    public function getParametre($nom) {
        if ($this->existeParametre($nom)) {
            return $this->parametres[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent de la requête");
    }
}