<?php
/**
 * Sample layout.
 */
use Core\Language;

?>

<div class="page-header">
    <h1><?php echo $data['title'] ?></h1>
</div>

<p><?php echo $data['welcome_message'] ?></p>
<table>
    <thead>
        <th>Etudiant</th>
        <th>Groupe</th>
        <th>Absences non justifiés</th>
    </thead>
    <tbody>
    <?php foreach ($data['baddies'] as $baddy) {?>
        <tr>
            <th><?php echo $baddy[0]; ?></th>
            <th><?php echo $baddy[3]; ?></th>
            <th><?php echo $baddy[1]; ?></th>

        </tr>
    <?php } ?>
    </tbody>

</table>
</a>
