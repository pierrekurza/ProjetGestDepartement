<?php
/**
 * Sample layout.
 */
use Core\Language;
use Models\Queries\HoraireSQL;
use Controllers\HoraireGroupe;

?>

<div class="page-header">
	<h1>Bienvenue </h1>
</div>

<div >
	<p>Cette page montre les différentes anomalies pour les horaires de cours.</p>
</div>

<p>
		<?php
		$hor = new HoraireSQL();
		if(count($data['horaires'])!=0 || count($data['horairesInf'])){
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
			foreach($data['horaires'] as $anomalie){
				echo '<tr><td>'.$anomalie->msg.'</td> <td>'.$anomalie->shortname.'</td><td> '.$anomalie->periode.'</td> 
				<td>'.$anomalie->departement.'</td> <td>'.$anomalie->UE.'</td> <td> '.$anomalie->matiere.'</tr>';
				
			}
			
			foreach($data['horairesInf'] as $anomalie){
				echo '<tr><td>'.$anomalie->msg.'</td> <td>'.$anomalie->shortname.'</td><td> '.$anomalie->periode.'</td> 
				<td>'.$anomalie->departement.'</td> <td>'.$anomalie->UE.'</td> <td> '.$anomalie->matiere.'</tr>';
				
			}
		?>
			</tbody>
		</table>

		<?php 
		}
		else {
			echo "Il n'y a aucune anomalie provenant des heures planifiées selon celles prévues ! ";
		}
		?>
</p>

		<form action="" method="post" >
			<p>Matières : <br/>
			<?php 
				$t = array();
				$t = $hor->getMatiere();
				?><select name="matiere" id="matiere">;
			<?php
				
				foreach($t as $matiere) {
					?><option value="<?php echo $matiere['matiere']?>"><?php echo $matiere['matiere']?></option><?php
				}
			?>
			
				</select>
				<br/>
				<input type="submit" value="Tri"></code>
			</p>
		</form>
		
		<form method="post" action="">
			<p>UE : <br/>
			<?php 
				$t = array();
				$t = $hor->getUE();
				?><select name="UE" id="UE">;
			<?php
			echo ($t);
				foreach($t as $UE) {
					?><option value="<?php echo $UE['UE']?>"><?php echo $UE['UE']?></option><?php
				}
			?>
			
				</select>
				<br/>
				<input type="submit" value="Tri"></code>
			</p>
		</form>

<p>
		<?php
		$horaireGroupe = new HoraireGroupe();
		$horGroupe = array();
		$horGroupe = $horaireGroupe->changeData($_POST);
		if(count($horGroupe)!=0){
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
			foreach($horGroupe as $anomalie){
				echo '<tr><td>'.$anomalie->msg.'</td> <td>'.$anomalie->shortname.'</td><td> '.$anomalie->periode.'</td> 
				<td>'.$anomalie->departement.'</td> <td>'.$anomalie->UE.'</td> <td> '.$anomalie->matiere.'</tr>';
				
			}
		?>
			</tbody>
		</table>
		<?php 
		}
		else {
			if($_POST['matiere']) 
				echo "Aucune anomalie dans les groupes pour la matiere : ".$_POST['matiere'];
			else if($_POST['UE'])
				echo "Aucune anomalie dans les groupes pour l'UE : ".$_POST['UE'];
			else
				echo "Il n'y a aucune anomalie selon les groupes qui pourraient avoir un nombre d'heures différent des autres ! ";
		}
		?>
</p>

