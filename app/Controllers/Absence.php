<?php
/**
 * Welcome controller.
 *
 * @author David Carr - dave@daveismyname.com
 *
 * @version 2.2
 * @date June 27, 2014
 * @date updated Sept 19, 2015
 */
namespace Controllers;

use App\Core\Controller;
use Nova\View\View;
use Helpers\DB\DBManager;
use Models\Queries\courseSQL;
use Models\Queries\datasSQL;
use Models\Queries\etudiantSQL;
use Models\Queries\groupeSQL;
use Models\Queries\ingroupSQL;
use Models\Queries\LessonSQL;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class Absence extends Controller
{
    private $datasSQL;
    private $etudiantSQL;
    private $ingroupSQL;
    private $groupeSQL;
    private $lessonSQL;
    private $courseSQL;


    /**
     * Call the parent construct.
     */
    public function __construct()
    {
        parent::__construct();
        $this->language->load('Welcome');
        $this->datasSQL=new datasSQL();
        $this->etudiantSQL=new etudiantSQL();
        $this->ingroupSQL=new ingroupSQL();
        $this->groupeSQL=new groupeSQL();
        $this->lessonSQL=new LessonSQL();
        $this->courseSQL=new courseSQL();


    }


    public function spotBadGuys($absencesMax=14){
        $data['title'] = 'Absences au dessus du seuil';
        $tabAbs=$this->datasSQL->prepareFindWithCondition('justified=0')->execute();
        //print_r($tabAbs);
        $tabEtu=$this->etudiantSQL->prepareFindAll()->execute();
        $tabCpt=array();
        $maxIdEtu=0;
        foreach($tabAbs as $abs){
            $tabCpt[$abs['etudiant_id']]++;
            if($maxIdEtu<$abs['etudiant_id'])
                $maxIdEtu=$abs['etudiant_id'];
        }
        $badGuys=array();
        for($i=0;$i<$maxIdEtu;$i++){
            if($tabCpt[$i]>$absencesMax)
                $badGuys[]=array($i,$tabCpt[$i],null,null);
        }
        //print_r($tabEtu[0]);
        //Tableau $badGuys(<nomPrenomEtu>,<nombreAbs>,<idetu>,<Departement>)
        $ingroup=$this->ingroupSQL->prepareFindAll()->execute();
        $groupe=$this->groupeSQL->prepareFindAll()->execute();
        $assoGrpNom=array();
        foreach($ingroup as $ingrp){
            foreach($groupe as $grp){
                if($ingrp['groupe_id']==$grp['id'])
                    $assoGrpNom[]=array($ingrp['groupe_id'],$grp['maingroupe']);
            }
        }
        //print_r ($assoGrpNom);

        for($i=0;$i<count($badGuys);$i++){
            foreach($tabEtu as $etu) {
                if($etu['id']==$badGuys[$i][0]) {
                    $name=$etu['fname'];
                    $surname=$etu['lname'];
                }
            }
            $badGuys[$i][2]=$badGuys[$i][0];
            $badGuys[$i][0]='<a href=absences/'.$badGuys[$i][2].'>'.$surname.' '.$name.'</a>';
            foreach($ingroup as $ingrp){
                if($badGuys[$i][2]==$ingrp['etudiant_id']){
                    foreach($assoGrpNom as $ass){
                        if($ingrp['groupe_id']==$ass[0]){
                            $badGuys[$i][3]=$ass[1];
                        }
                    }
                }
            }
        }
        return $badGuys;
    }

    /**
     * Define Index page title and load template files.
     */
    public function index()
    {
        $data['welcome_message'] ="";
        $data['baddies'] =$this->spotBadGuys();
        View::renderTemplate('header', $data);
        View::render('absence/absence', $data);
        View::renderTemplate('footer', $data);
    }


    public function getEtudiant($id=169){
        $etu=$this->etudiantSQL->prepareFindWithCondition('id='.$id)->execute();
        $data['title']="Details des absences de ".$etu[0]['lname']." ".$etu[0]['fname'];
        $tabEtu=$this->datasSQL->prepareFindWithCondition("etudiant_id=".$id)->execute();
        //tabEnvoi(<Module><TD,TP,CM><HoraireDeb><Horairefin><Justifié><Pourcentage>)
        $tabCourseManque=array();
        $tabEnvoi=array();
        //print_r($tabEtu);
        foreach ($tabEtu as $cours) {
            //print_r($cours);
            $tmp = array(null, null, null, null, null, null);
            $lesson = $this->lessonSQL->prepareFindWithCondition('id=' . $cours['lesson_id'])->execute();
            //print_r($lesson['0']->course_id.PHP_EOL);
            $courseId = $lesson['0']->course_id;
            if($courseId!=null) {
                //print "---------------".$courseId.PHP_EOL;
                $course = $this->courseSQL->prepareFindWithCondition('id=' . $courseId)->execute();
                //print_r($course);
                $tmp[0] = $course[0]['module'];
                $tmp[1] = $lesson['0']->type;
                $tmp[2] = $lesson['0']->start;
                $tmp[3] = $lesson['0']->end;
                $tmp[4] = $cours['justified'];
                $tmp[5] = $courseId;
                $tabEnvoi[] = $tmp;
                if ($cours['justified'] == 0) {
                    if (isset($tabCourseManque[$courseId]))
                        $tabCourseManque[$courseId][1]++;
                    else
                        $tabCourseManque[$courseId] = array($courseId,1);

                }
            }

        }
        //echo "CALCUL POURCETAGE";
        $tabH=array();
        foreach($tabCourseManque as $cours){
            $cpt=0;
            if($cours!=0) {
                $req=$this->courseSQL->prepareFindWithCondition('id='.$cours[0])->execute();
                //print_r ($req);
                $cpt+=$req[0]['nbcmhours'];
                $cpt+=$req[0]['nbtdhours'];
                $cpt+=$req[0]['nbtphours'];
            }
            $tabH[$cours[0]]=$cours[1]/$cpt*100;
        }
        //print_r($tabH);
        for($i=0;$i<count($tabEnvoi);$i++){
            $req=$this->courseSQL->prepareFindWithCondition('id=' . $tabEnvoi[$i][5])->execute();
            //print_r($req);
            $var=$req[0]['module'];
            //echo $row[5];
            //echo $tabH[$row[5]];
            //echo $row[0];
            //echo $var;
            if($tabEnvoi[$i][0]==$var){
                $tabEnvoi[$i][5]=$tabH[$tabEnvoi[$i][5]];
                $tabEnvoi[$i][5]=substr($tabEnvoi[$i][5],0,3)." %";
            }
            if($tabEnvoi[$i][4]==1){
                $tabEnvoi[$i][5]="";
            }
        }

        //print_r($tabCourseManque);
        $data['absences']=$tabEnvoi;


        View::renderTemplate('header', $data);
        View::render('absence/getEtudiant', $data);
        View::renderTemplate('footer', $data);
    }

}
