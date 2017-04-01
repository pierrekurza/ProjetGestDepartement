<?php

/**
 * Created by PhpStorm.
 * User: Norcis
 * Date: 05/03/2016
 * Time: 20:48
 */
use Helpers\DB\Entity;

class groupe extends Entity
{
    private $name;
    private $dept;
    private $semester;
    private $surgroupe;
    private $nbgroupes;
    private $defaulttype;
    private $maingroupe;
    private $start;
    private $end;

    protected $utilisateur;

    /**
     * groupe constructor.
     * @param $name
     * @param $dept
     * @param $semester
     * @param $surgroupe
     * @param $nbgroupes
     * @param $defaulttype
     * @param $maingroupe
     * @param $start
     * @param $end
     */
    public function __construct($name, $dept, $semester, $surgroupe, $nbgroupes, $defaulttype, $maingroupe, $start, $end,$id=false)
    {
        parent::__construct($id);
        $this->name = $name;
        $this->dept = $dept;
        $this->semester = $semester;
        $this->surgroupe = $surgroupe;
        $this->nbgroupes = $nbgroupes;
        $this->defaulttype = $defaulttype;
        $this->maingroupe = $maingroupe;
        $this->start = $start;
        $this->end = $end;
        $this->utilisateur=false;
    }        // L'instance associée


    public function getUtilisateur() {
        if ($this->utilisateur == false || $this->utilisateur->id != $this->utilisateur_id) {
            $sql = new UtilisateurSQL();
            $this->utilisateur = $sql->findById($this->utilisateur_id);
        }
        return $this->utilisateur;
    }

}