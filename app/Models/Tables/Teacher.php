<?php
namespace Models\Tables;


use Helpers\DB\Entity;

class Teacher extends Entity {
    public $id;
    public $shortname;
    public $name;
    public $surname;
    public $cnu;
    public $statut;
    public $dept;


    public function __construct($id=false,$shortname="",$name="",$surname="", $cnu="",$statut="", $dept="")
    {
        parent::__construct($id);
        $this->shortname = $shortname;
        $this->name = $name;
        $this->surname = $surname;
        $this->cnu = $cnu;
        $this->statut = $statut;
        $this->dept = $dept;
    }

}
?>