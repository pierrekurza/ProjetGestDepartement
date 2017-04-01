<?php

namespace Models\Queries;

use Helpers\DB\Query;
use Helpers\DB\Entity;
use Helpers\DB\EntityManager;


class TauxSalleSQL extends Query {
	public function getHeureSalle(){
		$s  = "select count(*),(select name from room where lesson.room_id=room.id) Salle ";
		$s .= "from lesson ";
		$s .= "group by Salle ";
		$this->sql=$s;
		return $this->execute();
	}
	
	public function getHeureSalleByMatiere($salle){
		$s = "	select count(*) nbHours,(select name from room where lesson.room_id=room.id) Salle, ";
		$s .= "	(select name from subject join course on subject.id=course.subject_id where course.id=lesson.course_id) matiere ";
		$s .= "	from lesson ";
		$s .= "	where (select name from room where lesson.room_id=room.id)='".$salle."'";
		$s .= "	group by matiere ";

		$this->sql=$s;
		return $this->execute();
	}
	
	public function getHeureSalleByDept($salle){
		$s = "select count(*) nbHours, (select name from room where lesson.room_id=room.id) Salle, ";
		$s .="(select distinct dept from course where course.id=lesson.course_id) departement ";
		$s .="from lesson ";
		$s .="where (select name from room where lesson.room_id=room.id)='".$salle."' ";
		$s .="group by departement ";

		$this->sql=$s;
		return $this->execute();
	}
	
	public function getSalle(){
		$s = "select distinct name salle from room";
		$this->sql = $s;
		return $this->execute();
	}
	
}