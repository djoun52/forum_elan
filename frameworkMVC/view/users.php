<h2>Liste des utilisateurs</h2>
<ul>
    <?php
    
        foreach($data['users'] as $user){
            ?>
            <li><?= $user->getUsername()?> - 
                Membre depuis le <?= $user->getCreated_at("d/m/Y")?>
                à <?= $user->getCreated_at("H:i:s")?>
            </li>
            <?php
        }
    ?>
</ul>