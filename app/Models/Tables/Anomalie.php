<?php
namespace Models\Tables;


use Helpers\DB\Entity;

class Anomalie extends Entity {
    public $id;
    public $shortname;
    public $periode;
    public $msg;
	public $departement;
	public $UE;
	public $matiere;


    public function __construct($id=false,$msg="", $shortname="", $periode="",  $departement="", $UE="",$matiere="")
    {
        parent::__construct($id);
        $this->shortname = $shortname;
        $this->msg = $msg;
        $this->periode = $periode;
        $this->departement = $departement;
        $this->UE = $UE;
		$this->matiere=$matiere;
    }
}
?>