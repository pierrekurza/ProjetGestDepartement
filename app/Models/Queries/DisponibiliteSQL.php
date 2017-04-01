<?php
namespace Models\Queries;

use Helpers\DB\Query;
use Helpers\DB\Entity;
use Helpers\DB\EntityManager;


class DisponibiliteSQL extends Query {
	
	/*
	public function anomalie(){ 
		$sql = "SELECT  distinct a.teacher_id, 'DBLHOR' codeano, 'Plusieurs cours en même temps' msg,
		   (select shortname from teacher where teacher.id = a.teacher_id) shortname
		FROM lesson a, lesson b 
		WHERE a.id != b.id
		and a.teacher_id = b.teacher_id
		and a.start < b.end
		and a.end > b.start";
		$sth = $data->prepare($sql)->execute();
	}
	*/
}