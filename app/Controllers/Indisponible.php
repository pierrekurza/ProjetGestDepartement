<?php

namespace Controllers;

use App\Core\Controller;
use Nova\View\View;


use Models\Queries\IndisponibiliteSQL;
use Models\Tables\Anomalie;
class Indisponible extends Controller
{
    /**
     * Call the parent construct.
     */
	private $indisponibiliteSQL;
	private $jourFeries;
    public function __construct()
    {
        parent::__construct();
        $this->language->load('Welcome');
		$jourFeries = array();
		$this->indisponibiliteSQL = new IndisponibiliteSQL();
    }

    /**
     * Define Index page title and load template files.
     */
    public function index()
    {
	
        $data['title'] = "Indisponibilite";
        $data['welcome_message'] = "Cette page affiche les probl�mes lorsqu'un professeur est indisponible � un certain moment.";
		$tab = array();
		$tabAno = array();
		$jourFeries=array("2016-01-01","2016-03-28","2016-05-01","2016-05-05","2016-05-08","2016-05-16",
		"2016-07-14","2016-08-15","2016-11-01","2016-11-11","2016-12-25",
		"2017-01-01","2017-04-17","2017-05-01","2017-05-25","2017-05-08","2018-06-05",
		"2017-07-14","2017-08-15","2017-11-01","2017-11-11","2017-12-25",
		"2018-01-01","2018-03-28","2018-05-01","2018-05-05","2018-05-08","2018-05-16",
		"2018-07-14","2018-08-15","2018-11-01","2018-11-11","2018-12-25");
		
		foreach($jourFeries as $day){
			if($this->indisponibiliteSQL->getLessonByDay($day)!=null){
				$tab[]=$this->indisponibiliteSQL->getLessonByDay($day);
			}
		}
		if(count($tab)!=0){
			foreach($tab[0] as $ano){
				$tabAno[] = new Anomalie(null,"Cours un jour f�ri� ! ", null,$ano['date'],$ano['departement'],$ano['UE'],null);
			}
		}
		$data['indisponible']= $tabAno;
		
        View::renderTemplate('header', $data);
        View::render('indisponible/indisponibilites', $data);
        View::renderTemplate('footer', $data);
    }
	
	/*public function addJourFerie($day){
		if($this->indisponibiliteSQL->getLessonByDay($day)!=null){
				$tab[]=$this->indisponibiliteSQL->getLessonByDay($day);
		}
		
		if(count($tab)!=0){
			foreach($tab[0] as $ano){
				$tabAno[] = new Anomalie(null,"Cours un jour f�ri� ! ", null,$ano['date'],$ano['departement'],$ano['UE'],null);
			}
			array_push($data['indisponible'],$day);
		}
	}*/
}
