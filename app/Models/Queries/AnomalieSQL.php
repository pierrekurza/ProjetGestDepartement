<?php

namespace Models\Queries;

use Helpers\DB\Query;
use Helpers\DB\Entity;
use Helpers\DB\EntityManager;


class AnomalieSQL extends Query {
	public function teacher(){
		$s = "SELECT distinct (a.teacher_id), 'Le professeur a cours à deux endroits différents en même temps.' msg, ";
		$s .= "(select shortname from teacher where teacher.id = a.teacher_id) shortname, a.start periode, ";
		$s .= "(select dept from teacher where teacher.id = a.teacher_id) departement, ";
		$s .= "(select module from course where course.id = a.course_id) UE, ";
		$s .= "(select name from subject join course on subject.id=course.subject_id where course.id = a.course_id) matiere ";
		$s .= "FROM lesson a, lesson b ";
		$s .= "WHERE a.id != b.id ";
		$s .= "and a.teacher_id = b.teacher_id ";
		$s .= "and a.start < b.end ";
		$s .= "and a.end > b.start ";
		$s .= "order by a.start; ";
		
		$this->sql = $s;
		return $this->execute();
	}
	
	public function teacher2(){
	$s = "SELECT  teacher_id,  'Non disponible sur certains horaires' msg, ";
	$s .= "(select shortname from teacher where teacher.teacher.id = disponibilite.teacher_id) shortname ";
	$s .= "FROM lesson, disponibilite ";
	$s .= "where lesson.teacher_id = disponibilite.teacher_id ";
	$s .= "and weekday(lesson.start) = field(disponibilite.jour, 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche') - 1 ";
	$s .= "and ( ";
    $s .= "  (h8 = -1 and heure(start) <= 8 and heure(end) >= 9) ";
	$s .= "	 or (h9 = -1 and heure(start) <= 9 and heure(end) >= 11) ";
	$s .= "or (h10 = -1 and heure(start) <= 10 and heure(end) >= 11) ";
	$s .= "or (h11 = -1 and heure(start) <= 11 and heure(end) >= 12) ";
	$s .= "or (h12 = -1 and heure(start) <= 12 and heure(end) >= 13) ";
	$s .= "or (h13 = -1 and heure(start) <= 13 and heure(end) >= 14) ";
	$s .= "or (h14 = -1 and heure(start) <= 14 and heure(end) >= 15) ";	
	$s .= "or (h15 = -1 and heure(start) <= 15 and heure(end) >= 16) ";
	$s .= "or (h16 = -1 and heure(start) <= 16 and heure(end) >= 17) ";
	$s .= "or (h17 = -1 and heure(start) <= 17 and heure(end) >= 18) ";
    $s .= ")";
	$this->sql = $s;
	return $this->execute();
	}
	
	public function rooms(){
		$s = "SELECT distinct a.room_id, 'La salle est utilisée pour 2 cours différents.' msg, ";
		$s .= "(select name from room where room.id = a.room_id) shortname, a.start periode, ";
		$s .= "(select dept from room where room.id = a.room_id) departement, ";
		$s .= "(select module from course where course.id = a.course_id) UE, ";
		$s .= "(select name from subject join course on subject.id=course.subject_id where course.id = a.course_id) matiere ";
		$s .= "FROM lesson a, lesson b ";
		$s .= "WHERE a.id != b.id ";
		$s .= "and a.room_id = b.room_id "; 
		$s .= "and a.start < b.end ";
		$s .= "and a.end > b.start ";
		$s .= "order by a.start; ";

		$this->sql = $s;
		return $this->execute();
	}
	
	
}