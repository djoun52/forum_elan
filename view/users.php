<h2>Liste des utilisateurs</h2>
<ul>
    <?php
     var_dump($data);
        foreach($data['users'] as $user){
            ?>
            <li><?= $user->getPseudo()?> - 
                Membre depuis le <?= $user->getDatedecreation("d/m/Y")?>
                à <?= $user->getDatedecreation("H:i:s")?>
            </li>
            <?php
        }
    ?>
</ul>