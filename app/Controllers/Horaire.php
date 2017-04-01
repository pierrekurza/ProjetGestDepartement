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
use Models\Queries\AnomalieSQL;
use Models\Queries\HoraireSQL;
use Models\Tables\Anomalie;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class Horaire extends Controller
{
	private $anomalieSQL;
	private $horaireSQL;

    /**
     * Call the parent construct.
     */
    public function __construct()
    {
        parent::__construct();
		
        $this->language->load('Welcome');
		$this->anomalieSQL = new AnomalieSQL();
		$this->horaireSQL = new HoraireSQL();
    }

    public function index()
    {
		
		$data['horaires']=$this->getAnoHoraires();
		$data['horairesInf']=$this->getAnoHorairesInf(20);
        $data['welcome_message'] ="Bienvenue";
        View::renderTemplate('header', $data);
        View::render('horaires/horaires', $data);
        View::renderTemplate('footer', $data);
    }
	
	public function getAnoHoraires(){
		$tab = array();
		$tab2 = array();
		$anomalie = array();
		$tab = $this->horaireSQL->getHeureMatiere();
		$tab2 = $this->horaireSQL->getHeurePlanMatiere();
		foreach($tab as $ano){
			foreach($tab2 as $ano2){
				if($ano['matiere']==$ano2['matiere']){
					if($ano2['nbHours']>($ano['nbcmhours']+$ano['nbtdhours']+$ano['nbtphours']+$ano['nbgtd']+$ano['nbgcm']+$ano['nbgtp'])){
						$anomalie[]=new Anomalie(null,$ano2['nbHours']-($ano['nbcmhours']+$ano['nbtdhours']+$ano['nbtphours'])." heures planifiées en trop"
						,"pbHeure",$ano2['groupe'],$ano2['departement'],$ano2['UE'],$ano2['matiere']);
					}
				}
			}
		}
		
		return $anomalie;
	}
	
	public function getAnoHorairesInf($nbAccepte=20){
		$tab = array();
		$tab2 = array();
		$anomalie = array();
		$tab = $this->horaireSQL->getHeureMatiere();
		$tab2 = $this->horaireSQL->getHeurePlanMatiere();
		foreach($tab as $ano){
			foreach($tab2 as $ano2){
				if($ano['matiere']==$ano2['matiere']){
					if($ano2['nbHours']<($ano['nbcmhours']+$ano['nbtdhours']+$ano['nbtphours']+$ano['nbgtd']+$ano['nbgcm']+$ano['nbgtp'])){
						$accepte = (int)(100-($ano2['nbHours']/($ano['nbcmhours']+$ano['nbtdhours']+$ano['nbtphours']+$ano['nbgtd']+$ano['nbgcm']+$ano['nbgtp']))*100);
						if($accepte>=$nbAccepte){
							$anomalie[]=new Anomalie(null,"Nombre d'heures planifiées trop inférieur au nombre prévu"
							,"Il manque ".$accepte." % des heures prévues",null,$ano2['departement'],$ano2['UE'],$ano2['matiere']);
						}
					}
				}
			}
		}
		return $anomalie;
	}
	
}
