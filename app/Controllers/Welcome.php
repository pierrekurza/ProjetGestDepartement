<?php

namespace App\Controllers;

use App\Core\Controller;
use Nova\View\View;

use Models\Queries\DisponibiliteSQL;
use Models\Queries\TeacherSQL;
use Models\Queries\LessonSQL;
use Models\Queries\PlanningSQL;
use Models\Queries\AnomalieSQL;

class Welcome extends Controller
{
    /**
     * Call the parent construct.
     */
    public function __construct()
    {
        parent::__construct();
        //$this->language->load('Welcome');
		$this->DisponibiliteSQL = new DisponibiliteSQL();
		$this->TeacherSQL = new TeacherSQL();
		$this->LessonSQL = new LessonSQL();
		$this->PlanningSQL = new PlanningSQL();
		$this->AnomalieSQL = new AnomalieSQL();

    }

    /**
     * Define Index page title and load template files.
     */
    public function index()
    {
        $data['title'] = $this->language->get('welcome_text');
        $data['welcome_message'] = $this->language->get('welcome_message');
		$data['disponibilite']=$this->DisponibiliteSQL->prepareFindAll()->execute();
		$data['teachers']=$this->TeacherSQL->prepareFindAll()->execute();
		$data['lesson']=$this->LessonSQL->prepareFindAll()->execute();
		$data['planning']=$this->PlanningSQL->prepareFindAll()->execute();
		$data['rooms']=$this->AnomalieSQL->rooms();
		$data['teacher']=$this->AnomalieSQL->teacher();
        View::renderTemplate('header', $data);
        View::render('welcome/welcome', $data);
        View::renderTemplate('footer', $data);
    }

    /**
     * Define Subpage page title and load template files.
     */
    public function subPage()
    {
        $data['title'] = $this->language->get('subpage_text');
        $data['welcome_message'] = $this->language->get('subpage_message');

        View::renderTemplate('header', $data);
        View::render('welcome/subpage', $data);
        View::renderTemplate('footer', $data);
    }
	
	public function teachers()
    {
		$data['title'] = $this->language->get('teachers_text');
        $data['welcome_message'] = $this->language->get('teachers_message');
		$data['teacher']=$this->AnomalieSQL->teacher();

        View::renderTemplate('header', $data);
        View::render('welcome/teachers', $data);
        View::renderTemplate('footer', $data);
    }
	
	public function rooms(){
		$data['rooms']=$this->AnomalieSQL->rooms();
		View::renderTemplate('header', $data);
        View::render('welcome/rooms', $data);
        View::renderTemplate('footer', $data);
	}
	
	public function anomalies(){
		$data['rooms']=$this->AnomalieSQL->rooms();
		$data['teacher']=$this->AnomalieSQL->teacher();
		View::renderTemplate('header', $data);
        View::render('welcome/anomalies', $data);
        View::renderTemplate('footer', $data);
	}
}
