<h2>Liste des utilisateurs</h2>
<ul>
    <?php
    
        foreach($data['users'] as $user){
            ?>
            <li><?= $user->getPseudo()?> - 
                Membre depuis le <?= $user->getDate_de_creation("d/m/Y")?>
                à <?= $user->getDate_de_creation("H:i:s")?>
            </li>
            <?php
        }
    ?>
</ul>