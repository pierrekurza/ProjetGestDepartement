<?php
/**
 * Sample layout.
 */
use Core\Language;
use Controllers\Indisponible;
?>

<div class="page-header">
	<h1>Bienvenue </h1>
</div>

<div >
	<p>Cette page montre les différentes anomalies pour les professeurs (cours les jours fériés).</p>
</div>

<p>	<?php
		/*$ferie = new Indisponible();
			if($_POST!=null){
				$ferie -> addJourFerie($_POST['day']);
			}*/
		?>
		
		<?php
			
			if(count($data['indisponible'])!=0){
		?>
		<table>
			<thead>
				<tr>
					<th> Description de l'anomalie </th>
					<th> Nom </th>
					<th> Jour </th>
					<th> Département </th>
					<th> UE </th>
					<th> Matière </th>
				</tr>
			</thead>
			<tbody>	
		<?php 
			foreach($data['indisponible'] as $anomalie){
				echo '<tr><td>'.$anomalie->msg.'</td> <td>'.$anomalie->shortname.'</td><td> '.$anomalie->periode.'</td> 
				<td>'.$anomalie->departement.'</td> <td>'.$anomalie->UE.'</td> <td> '.$anomalie->matiere.'</tr>';
				
			}
		
		?>
			</tbody>
		</table>
		<?php 
		}
		else {
			echo "Il n'y a aucune anomalie ! ";
		}
		?>
	<!--<br/>Vous pouvez ajouter un jour férié ici 
		<form method="post" action="">
			 <input type="text" name="day" value="AAAA-MM-JJ"/>
			<input type="submit" value="Ajouter"></code>
		</form>-->
		
		
	</p>


