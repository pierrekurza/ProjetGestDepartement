<?php
/**
 * Sample layout.
 */
use Core\Language;

?>

<div class="page-header">
	<h1>Bienvenue </h1>
</div>

<div >
	<p>Cette page montre les différentes anomalies pour les professeurs.</p>
</div>

<p>
		<?php
		if(isset($data['teacher'])){
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
			foreach($data['teacher'] as $anomalie){
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
	</p>


