<?php
/**
 * Sample layout.
 */
use Core\Language;

?>

<div class="page-header">
	<h1><?php echo $data['title']; ?></h1>
</div>

<div >
	<p><?php echo $data['welcome_message'] ?></p>
</div>

<p>
		<?php
		if(isset($data['rooms'])){
		?>
		<table>
			<thead>
				<tr>
					<th> Description de l'anomalie </th>
					<th> Nom de la salle </th>
					<th> Jour </th>
					<th> Département </th>
					<th> UE </th>
					<th> Matière </th>
				</tr>
			</thead>
			<tbody>	
		<?php 
			foreach($data['rooms'] as $anomalie){
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


