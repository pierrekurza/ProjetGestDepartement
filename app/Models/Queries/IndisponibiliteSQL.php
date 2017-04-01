<?php

namespace Models\Queries;

use Helpers\DB\Query;
use Helpers\DB\Entity;
use Helpers\DB\EntityManager;


class IndisponibiliteSQL extends Query {
	public function getLessonByDay($day=""){
		$s  = "	select start date, (select dept from groupe where groupe.id = lesson.groupe_id) departement, ";
		$s .= "	(select module from course where course.id = lesson.course_id) UE ";
		$s .= "	from lesson ";
		$s .= "	where start like '".$day."%'";
		
		$this->sql = $s;
		return $this->execute();
	}
}
?>