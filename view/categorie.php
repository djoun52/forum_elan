<h2>Liste des categorie</h2>
<form action="?ctrl=reserche&method=reserche" method="post">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="rechercher  topics" name="reserche" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
        <div class="input-group-append" id="button-addon4">
            <button class="btn btn-outline-primary" type="type" name="type" value="categorie">categorie</button>
            <button class="btn btn-outline-primary" type="type" name="type" value="mot">mots-clés</button>
        </div>
    </div>
</form>

    <?php
     var_dump($data);
        foreach($data['categorie'] as $categorie){
            ?>
            <li>
            <a href="?ctrl=reserche&method=reserchelink&categorie=<?= $categorie->getNom()?> "><?= $categorie->getNom()?> </a>
            </li>
            <?php
        }
    ?>
</ul>