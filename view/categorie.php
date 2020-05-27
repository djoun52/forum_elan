<h2>Liste des categorie</h2>
<a href="?ctrl=home&method=reserche">rechercher un topic </a>
<a href="?ctrl=home&method=reserche">créer un topic </a>
<ul>
    <?php
     var_dump($data);
        foreach($data['categorie'] as $categorie){
            ?>
            <li><?= $categorie->getNom()?> 
               
            </li>
            <?php
        }
    ?>
</ul>