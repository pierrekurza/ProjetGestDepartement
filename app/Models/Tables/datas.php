<?php

/**
 * Created by PhpStorm.
 * User: Norcis
 * Date: 05/03/2016
 * Time: 20:48
 */
use Helpers\DB\Entity;

class datas extends Entity
{
    private $reason; //Raison de l'absence
    private $piece; //??????
    private $justified; //Vrai si justifié
    private $etudiant_id; //Id étudiant
    private $lesson_id; //ID cours

    protected $utilisateur;        // L'instance associée

    public function __construct($reason="",$piece="",$justified=false,$etudiant_id="",$lesson_id="", $id = false) {
        parent::__construct($id);
        $this->reason=$reason;
        $this->piece=$piece;
        $this->justified=$justified;
        $this->etudiant_id=$etudiant_id;
        $this->lesson_id=$lesson_id;
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