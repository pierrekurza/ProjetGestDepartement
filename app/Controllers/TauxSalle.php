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
use Models\Queries\tauxSalleSQL;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class TauxSalle extends Controller
{
	private $tauxSalle;

    /**
     * Call the parent construct.
     */
    public function __construct()
    {
        parent::__construct();
		
        $this->language->load('Welcome');
		$this->tauxSalle = new tauxSalleSQL();
    }

    public function index()
    {
		
        $data['welcome_message'] ="Bienvenue";
        View::renderTemplate('header', $data);
        View::render('salle/tauxSalles', $data);
        View::renderTemplate('footer', $data);
    }
	
}
