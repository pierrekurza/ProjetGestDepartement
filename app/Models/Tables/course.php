<?php

/**
 * Created by PhpStorm.
 * User: Norcis
 * Date: 05/03/2016
 * Time: 20:48
 */

if (!class_exists('course')) {
    class course extends Helpers\DB\Entity
    {
        private $semester; //
        private $module; //??????
        private $description; //
        private $nbcmhours; //
        private $nbtdhours; //
        private $nbtphours; //
        private $nbgcm; //
        private $nbgtd; //
        private $nbgtp; //
        private $dept; //
        private $comment; //
        private $subject_id; //
        private $traininginfo_id; //

        protected $utilisateur;

        public function __construct($id = false, $semester = "", $module = "", $description = "", $nbcmhour = "", $nbtdhours = "", $nbtphours = "", $nbgcm = "", $nbgtd = "", $nbgtp = "", $dept = "", $comment = "", $subject_id = "", $traininginfo_id = "")
        {
            parent::__construct($id);
            $this->semester = $semester;
            $this->module = $module;
            $this->description = $description;
            $this->nbcmhours = $nbcmhour;
            $this->nbtdhours = $nbtdhours;
            $this->nbtphours = $nbtphours;
            $this->nbgcm = $nbgcm;
            $this->nbgtd = $nbgtd;
            $this->nbgtp = $nbgtp;
            $this->dept = $dept;
            $this->comment = $comment;
            $this->subject_id = $subject_id;
            $this->traininginfo_id = $traininginfo_id;
            $this->utilisateur = false;
        }        // L'instance associée


        public function getUtilisateur()
        {
            if ($this->utilisateur == false || $this->utilisateur->id != $this->utilisateur_id) {
                $sql = new UtilisateurSQL();
                $this->utilisateur = $sql->findById($this->utilisateur_id);
            }
            return $this->utilisateur;
        }

    }
}