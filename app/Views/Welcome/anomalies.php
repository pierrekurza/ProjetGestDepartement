<?php
/**
 * Sample layout.
 */
use Core\Language;
use Controllers\Absence;
use Controllers\Horaire;
use Controllers\HoraireGroupe;

?>

<div class="page-header">
	<h1><?php echo $data['title'] ?></h1>
</div>

<div>
<?php 
	$hor = new Horaire();
	$horgr = new HoraireGroupe();
	if(isset($data['rooms'])){

?>
	<input type = "button" class="pasBon" value="Conflits dans les horaires pour les salles" OnClick="window.location.href='http://localhost/GestionDepartement/mvc/rooms'"/>

<?php }
	if(count($hor->getAnoHoraires())!=0 || count($hor->getAnoHorairesInf())!=0 || count($horGr->ChangeData())!=0){

?>
	<input type = "button" class="pasBon" value="Conflits dans le nombre d'heures" OnClick="window.location.href='http://localhost/GestionDepartement/mvc/horaires'"/>

	<?php }
	if(isset($data['teacher'])){

?>
	<input type = "button" class="pasBon" value="Conflits dans les horaires des professeurs" OnClick="window.location.href='http://localhost/GestionDepartement/mvc/teachers'"/>
	<?php }
	else{

?>
	<input type = "button" class="pasBon" value="Conflits entre horaires et disponibilités" OnClick="window.location.href='http://localhost/GestionDepartement/mvc/indisponibilites'"/>
	<?php }
	?>
</div>

