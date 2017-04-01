<?php

/**
 * Created by PhpStorm.
 * User: Norcis
 * Date: 28/03/2016
 * Time: 10:11
 */
class ingroup extends \Helpers\DB\Entity
{
    private $start;
    private $end;
    private $etudiant_id;
    private $groupe_id;
    protected $utilisateur;        // L'instance associée

    /**
     * ingroup constructor.
     * @param $id
     * @param $start
     * @param $end
     * @param $etudiant_id
     * @param $groupe_id
     */
    public function __construct($start, $end, $etudiant_id, $groupe_id, $id = false)
    {
        parent::__construct($id);

        $this->start = $start;
        $this->end = $end;
        $this->etudiant_id = $etudiant_id;
        $this->groupe_id = $groupe_id;
        $this->utilisateur=false;
    }

    public function getUtilisateur() {
        if ($this->utilisateur == false || $this->utilisateur->id != $this->utilisateur_id) {
            $sql = new UtilisateurSQL();
            $this->utilisateur = $sql->findById($this->utilisateur_id);
        }
        return $this->utilisateur;
    }

}