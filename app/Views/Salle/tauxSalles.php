<?php
/**
 * Sample layout.
 */
use Core\Language;
use Models\Queries\TauxSalleSQL;

?>		
<div class="page-header">
	<h1>Bienvenue </h1>
</div>

<div >
	<p>Cette page vous permet de voir le taux d'utilisation d'une salle pour chaque matières ou chaque départements.</p>
</div>

		
		<form action="" method="post" >
			<p>Matières : <br/>
			<?php 
				$tS = new TauxSalleSQL();
				$t = array();
				$t = $tS->getSalle();
				?><select name="matiere" id="matiere">;
			<?php
				
				foreach($t as $salle) {
					?><option value="<?php echo $salle['salle']?>"><?php echo $salle['salle']?></option><?php
				}
			?>
			
				</select>
				<br/>
				<input type="submit" value="Tri"></code>
			</p>
		</form>
		
		<form method="post" action="">
			<p>Departement : <br/>
			<?php 
				$t = array();
				$t = $tS->getSalle();
				?><select name="departement" id="departement">;
			<?php
			echo ($t);
				foreach($t as $salle) {
					?><option value="<?php echo $salle['salle']?>"><?php echo $salle['salle']?></option><?php
				}
			?>
			
				</select>
				<br/>
				<input type="submit" value="Tri"></code>
			</p>
		</form>
		
<p>
		<?php
		if($_POST['matiere']){
			$tauxSalle = $tS->getHeureSalleByMatiere($_POST['matiere']);
			if(count($tauxSalle)!=0){
		?>
			<table>
				<thead>
					<tr>
						<th> Nombre d'heures </th>
						<th> Salle </th>
						<th> Matière </th>
					</tr>
				</thead>
				<tbody>	
			<?php 
				foreach($tauxSalle as $desc){
					echo '<tr><td>'.$desc['nbHours'].'</td> <td>'.$desc['Salle'].'</td><td> '.$desc['matiere'].'</td></tr>';
				}
			?>
				</tbody>
			</table>
			<?php 
			}
		}
		else if($_POST['departement']) {
			$tauxSalle = $tS->getHeureSalleByDept($_POST['departement']);
			if(count($tauxSalle)!=0){
		?>
			<table>
				<thead>
					<tr>
						<th> Nombre d'heures </th>
						<th> Salle </th>
						<th> Departement </th>
					</tr>
				</thead>
				<tbody>	
			<?php 
				foreach($tauxSalle as $desc){
					echo '<tr><td>'.$desc['nbHours'].'</td> <td>'.$desc['Salle'].'</td><td> '.$desc['departement'].'</td></tr>';
				}
			?>
				</tbody>
			</table>
			<?php 
			}
		}
		
		else {
			echo "Aucun cours dans cette salle ! ";
		}
		?>
</p>