<h2>Liste des topics</h2>
<a href="?ctrl=home&method=reserche">rechercher un topic </a>
<a href="?ctrl=home&method=reserche">créer un topic </a>
<ul>
    <?php
     var_dump($data);
        foreach($data['topics'] as $topics){
            ?>
            <li><?= $topics->getTitre()?> - 
                créer  depuis le <?= $topics->getDatedecreation("d/m/Y")?>
                à <?= $topics->getDatedecreation("H:i:s")?>
            </li>
            <?php
        }
    ?>
</ul>