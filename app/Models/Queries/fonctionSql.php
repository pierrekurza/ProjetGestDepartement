SELECT  distinct a.teacher_id, 'DBLHOR' codeano, 'Plusieurs cours en même temps' msg,
       (select shortname from teacher where teacher.id = a.teacher_id) shortname
FROM lesson a, lesson b 
WHERE a.id != b.id
and a.teacher_id = b.teacher_id
and a.start < b.end
and a.end > b.start

SELECT  teacher_id, 'NONDISPO' codeano, 'Non disponible sur certains horaires' msg,
       (select shortname from teacher where teacher.teacher.id = disponibilite.teacher_id) shortname
FROM lesson, disponibilite
where lesson.teacher_id = disponibilite.teacher_id
and weekday(lesson.start) = field(disponibilite.jour, "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche") - 1
and (
      (h8 = -1 and heure(start) <= 8 and heure(end) >= 9)
   or (h9 = -1 and heure(start) <= 9 and heure(end) >= 11)
   or (h10 = -1 and heure(start) <= 10 and heure(end) >= 11)
   or (h11 = -1 and heure(start) <= 11 and heure(end) >= 12)
   or (h12 = -1 and heure(start) <= 12 and heure(end) >= 13)
   or (h13 = -1 and heure(start) <= 13 and heure(end) >= 14)
   or (h14 = -1 and heure(start) <= 14 and heure(end) >= 15)
   or (h15 = -1 and heure(start) <= 15 and heure(end) >= 16)
   or (h16 = -1 and heure(start) <= 16 and heure(end) >= 17)
   or (h17 = -1 and heure(start) <= 17 and heure(end) >= 18)
   
    )
	
	
SELECT distinct (a.teacher_id), 'Le professeur a cours à deux endroits différents en même temps.' msg, 
(select shortname from teacher where teacher.id = a.teacher_id) shortname, a.start periode, 
(select dept from teacher where teacher.id = a.teacher_id) departement, 
(select module from course where course.id = a.course_id) UE,
(select name from subject inner join course on subject.id=course.subject_id where course.id = a.course_id) matiere
FROM lesson a, lesson b 
WHERE a.id != b.id 
and a.teacher_id = b.teacher_id 
and a.start < b.end 
and a.end > b.start 
order by a.start; 

select nbcmhours,nbtdhours,(select name from subject where subject_id=subject.id)
from course

select count(*) nbHours,(select name from subject join course on course.subject_id=subject.id where course.id=lesson.course_id) matiere,
(select dept from teacher where teacher.id = lesson.teacher_id) departement,
(select module from course where course.id = lesson.course_id) UE
from lesson join course on lesson.course_id=course.id
group by matiere

select name matiere
from subject

select count(*) nbHours, (select name from groupe where groupe.id=lesson.groupe_id) groupe,
(select dept from groupe where groupe.id = lesson.groupe_id) departement,
(select module from course where course.id = lesson.course_id) UE,
(select name from subject join course on course.subject_id=subject.id where course.id=lesson.course_id) matiere
from lesson
group by groupe


select start, (select dept from groupe where groupe.id = lesson.groupe_id) departement,
(select module from course where course.id = lesson.course_id) UE
from lesson
where start like '2015-09-07%';

select count(*),(select name from room where lesson.room_id=room.id) Salle
from lesson
group by Salle

select count(*),(select name from room where lesson.room_id=room.id) Salle, 
(select name from subject join course on subject.id=course.subject_id where course.id=lesson.course_id) matiere 
from lesson 
where (select name from room where lesson.room_id=room.id)="05 E"
group by matiere

