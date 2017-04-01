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
class HoraireGroupe extends Controller
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
	
	public function changeData($tri=""){
		$t = array();
		$horaires = array();
		$ano = array();
		
		$t = $this->horaireSQL->getGroupeByMatiere($tri['matiere']);
		if($tri['matiere']) {
			foreach($t as $varTri){
				if($varTri['matiere'] == $tri['matiere'] ){
					$horaires[]=$varTri;
				}
			}
		}
		
		else {
			foreach($t as $varTri){
				if($varTri['UE'] == $tri['UE'] ){
					$horaires[]=$varTri;
				}
			}
		}
		
		for($i=0;$i<count($horaires);$i++){
			for($j=i+1;$j<count($horaires);$j++){
				if($horaires[$i]['nbHours']!=$horaires[$j]['nbHours']){
					$ano[]=new Anomalie(null,"Le groupe ".$horaires[$i]['groupe']." a un nombre d'heures différents du groupe ".$horaires[$j]['groupe'],
					$horaires[$i]['groupe']." : ".$horaires[$i]['nbHours']."heures. ".$horaires[$j]['groupe']." : ".$horaires[$j]['nbHours']."heures.",
					null,$horaires[$i]['departement'],$horaires[$i]['UE'],$horaires[$i]['matiere']);
				}
			}
		}
		
		return $ano;
	}
}
