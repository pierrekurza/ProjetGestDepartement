<?php

/**
 * Created by PhpStorm.
 * User: Norcis
 * Date: 05/03/2016
 * Time: 20:48
 */
use Helpers\DB\Entity;

class etudiant extends Entity
{
    private $gender;
    private $fname;
    private $lname;
    private $adr;
    private $cp;
    private $city;
    private $apogee;
    private $ordre;
    private $mail;
    private $avatar;

    protected $utilisateur;        // L'instance associée

    public function __construct($gender="",$fname="",$lname=false,$adr="",$cp="",$city="",$apogee="",$ordre="",$mail="",$avatar="", $id = false) {
        parent::__construct($id);
        $this->gender=$gender;
        $this->fname=$fname;
        $this->lname=$lname;
        $this->adr=$adr;
        $this->cp=$cp;
        $this->city=$city;
        $this->apogee=$apogee;
        $this->ordre=$ordre;
        $this->mail=$mail;
        $this->avatar=$avatar;


        $this->utilisateur = false;
    }


    public function getUtilisateur() {
        if ($this->utilisateur == false || $this->utilisateur->id != $this->utilisateur_id) {
            $sql = new UtilisateurSQL();
            $this->utilisateur = $sql->findById($this->utilisateur_id);
        }
        return $this->utilisateur;
    }

}