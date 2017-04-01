<?php
namespace Models\Tables;


use Helpers\DB\Entity;

class Lesson extends Entity {
    public $id;
    public $start;
    public $end;
    public $num;
    public $type;
    public $duration;
    public $manual;
    public $color;
    public $course_id;
    public $teacher_id;
    public $groupe_id;
    public $room_id;

    public function __construct($id=false,$start="",$end="",$num="", $type="",$duration="", $manual="",$color="",$course_id="",$teacher_id="",$groupe_id="",$room_id="")
    {
        parent::__construct($id);
        $this->start = $start;
        $this->end = $end;
        $this->num = $num;
        $this->type = $type;
        $this->duration = $duration;
        $this->manual = $manual;
        $this->color = $color;
        $this->course_id = $course_id;
        $this->teacher_id = $teacher_id;
        $this->groupe_id = $groupe_id;
        $this->room_id = $room_id;
    }

}
?>