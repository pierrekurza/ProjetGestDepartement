<?php
/**
 * Sample layout.
 */
use Core\Language;
use Controllers\Absence;
use Controllers\Horaire;

?>

<div class="page-header">
	<h1><?php echo $data['title'] ?></h1>
</div>

<div>
<?php 
	$hor = new Horaire();
	if(isset($data['rooms']) || isset($data['teacher']) || count($hor->getAnoHoraires())!=0){

?>
	<input type = "button" class="pasBon" value="Conflits dans les horaires" OnClick="window.location.href='http://localhost/GestionDepartement/mvc/anomalies'"/>
<?php }
	else {
?>
	<input type = "button" class="bon" value="Anomalie" OnClick="window.location.href='http://localhost/GestionDepartement/mvc/anomalies'"/> 
	Aucune anomalie.
<?php 
	}
	$abs = new Absence();
	if(count($abs->spotBadGuys())!=0){

?>
	<input type = "button" class="pasBon" value="Trop d'absences ! " OnClick="window.location.href='http://localhost/GestionDepartement/mvc/absences'"/>
<?php
	}
	else {
?>
	<input type = "button" class="bon" value="Absences" OnClick="window.location.href='http://localhost/GestionDepartement/mvc/absences'"/>
	Aucune absence trop élevée.
<?php }
	
?>
	<input type = "button" class="bon" value="Taux d'utilisation des salles" OnClick="window.location.href='http://localhost/GestionDepartement/mvc/tauxSalles'"/>
</div>




