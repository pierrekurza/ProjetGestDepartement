<?php
/**
 * Sample layout.
 */
use Core\Language;

?>

<div class="page-header">
    <h1><?php echo $data['title'] ?></h1>
</div>
<div>
    <h2><?php echo count($data['absences']) ?> absences au total</h2>
    <table>
        <thead>
            <tr>
                <th> UE </th>
                <th> Type de cours </th>
                <th> Début </th>
                <th> Fin </th>
                <th> Justifié </th>
                <th>Pourcentage</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['absences'] as $abs) {?>
                <tr>
                <td><?php echo $abs[0]; ?></td>
                <td><?php echo $abs[1]; ?></td>
                <td><?php echo $abs[2]; ?></td>
                <td><?php echo $abs[3]; ?></td>
                <td><?php if($abs[4]==1)echo "Oui";else echo "Non"; ?></td>
                    <td><?php echo $abs[5]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
