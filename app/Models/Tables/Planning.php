<?php
namespace Models\Tables;


use Helpers\DB\Entity;

class Planning extends Entity {
    public $id;
    public $teacher_id;
    public $course_id;
    public $cm;
    public $td;
    public $tp;


    public function __construct($id=false,$teacher_id="",$course_id="",$cm="", $td="",$tp="")
    {
        parent::__construct($id);
        $this->teacher_id = $teacher_id;
        $this->course_id = $course_id;
        $this->cm = $cm;
        $this->td = $td;
        $this->tp = $tp;
    }

}
?>