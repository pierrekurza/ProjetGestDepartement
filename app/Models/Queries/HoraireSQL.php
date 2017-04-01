<?php

namespace Models\Queries;

use Helpers\DB\Query;
use Helpers\DB\Entity;
use Helpers\DB\EntityManager;


class HoraireSQL extends Query {

	public function getHeureMatiere(){
		$s="select nbcmhours,nbtdhours, nbtphours,nbgcm,nbgtd,nbgtp,(select name from subject where subject_id=subject.id) matiere from course group by matiere";
		
		$this->sql = $s;
		return $this->execute();
	}
	
	public function getHeurePlanMatiere(){
		$s = "select count(*) nbHours,(select name from subject join course on course.subject_id=subject.id where course.id=lesson.course_id) matiere, ";
		$s .= "(select name from groupe where groupe.id=lesson.groupe_id) groupe, ";
		$s .= "(select dept from teacher where teacher.id = lesson.teacher_id) departement, ";
		$s .= "(select module from course where course.id = lesson.course_id) UE ";
		$s .= "from lesson join course on lesson.course_id=course.id ";
		$s .= "group by matiere";
		$this->sql = $s;
		return $this->execute();
	}
	
	public function getMatiere(){
		$s = "select distinct name matiere from subject";
		$this->sql = $s;
		return $this->execute();
	}
	
	public function getDept(){
		$s = "select distinct dept from course";
		$this->sql = $s;
		return $this->execute();
	}
	
	public function getUE(){
		$s = "select distinct module UE from course";
		$this->sql = $s;
		return $this->execute();
	}
	
	public function getGroupeByMatiere($matiere){
		$s  = "select count(*) nbHours, (select name from groupe where groupe.id=lesson.groupe_id) groupe, ";
		$s .= "(select dept from groupe where groupe.id = lesson.groupe_id) departement, ";
		$s .= "(select module from course where course.id = lesson.course_id) UE, ";
		$s .= "(select name from subject join course on course.subject_id=subject.id where course.id=lesson.course_id) matiere ";
		$s .= "from lesson ";
		$s .= " group by groupe ";
		$this->sql = $s;
		return $this->execute();
	}
	
}