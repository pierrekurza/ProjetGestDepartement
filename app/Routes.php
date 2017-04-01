<?php
/**
 * Routes - all standard Routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

use Core\Router;
use Helpers\Hooks;

/** Define static routes. */

// The default Routing
/*
Route::get('/',       'Welcome@index');
Route::get('subpage', 'Welcome@subPage');
*/

//Sans 'router'
Route::get('', 'Welcome@index');
Route::get('horaires', 'Horaire@index');
Route::get('tauxSalles', 'TauxSalle@index');
Route::get('teachers', 'Welcome@teachers');
Route::get('absences', 'Absence@index');
Route::get('rooms', 'Welcome@rooms');
Route::get('anomalies', 'Welcome@anomalies');
Route::get('indisponibilites', 'Indisponible@index');
Route::get('absences/(:num)', 'Absence@getEtudiant');


//Avec 'router'
/*
Router::any('', 'Welcome@index');
Router::any('horaires', 'Horaire@index');
Router::any('tauxSalles', 'TauxSalle@index');
Router::any('teachers', 'Welcome@teachers');
Router::any('absences', 'Absence@index');
Router::any('rooms', 'Welcome@rooms');
Router::any('anomalies', 'Welcome@anomalies');
Router::any('indisponibilites', 'Indisponible@index');
Router::any('absences/(:num)', 'Absence@getEtudiant');
*/


/*
$hooks = Hooks::get();
$hooks->run('routes');
Router::error('Core\Error@index');
Router::dispatch();
*/