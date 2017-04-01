<?php
namespace Models\Tables;


use Helpers\DB\Entity;

class Disponibilite extends Entity {
    public $id;
    public $teacher_id;
    public $dept;
    public $jour;
    public $h8;
    public $h9;
    public $h10;    
    public $h11;
    public $h12;
    public $h13;
   	public $h14;
   	public $h15;
   	public $h16;
   	public $h17;
    public $comment;


    public function __construct($id=false,$teacher_id="",$dept="",$jour="", $h8="",$h9="", $h10="", $h11="", $h12="", $h13="", $h14="", $h15="",$h16="",$h17="",$comment="")
    {
        parent::__construct($id);
        $this->teacher_id = $teacher_id;
        $this->dept = $dept;
        $this->jour = $jour;
        $this->h8 = $h8;
        $this->h9 = $h9;
        $this->h10 = $h10;
        $this->h11 = $h11;
        $this->h12 = $h12;
        $this->h13 = $h13;
        $this->h14 = $h14;
        $this->h15 = $h15;
		$this->h16 = $h16;
		$this->h17 = $h17;
        $this->comment = $comment;
    }

    /*
    public function getUtilisateur() {
        if ($this->utilisateur == false || $this->utilisateur->id != $this->utilisateur_id) {
            $sql = new UtilisateurSQL();
            $this->utilisateur = $sql->findById($this->utilisateur_id);
        }
        return $this->utilisateur;
    }*/

}
?>