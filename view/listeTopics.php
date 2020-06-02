<h2>Liste des topics</h2>


<form action="?ctrl=reserche&method=reserche" method="post">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="rechercher topics" name="reserche" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
        <div class="input-group-append" id="button-addon4">
            <button class="btn btn-outline-primary" type="type" name="type" value="categorie">categorie</button>
            <button class="btn btn-outline-primary" type="type" name="type" value="mot">mots-clés</button>
        </div>
    </div>
</form>
<ul>




    <?php
    //  var_dump($data);
    //  var_dump($data['topics']['0']);



    if ($data['topics']) {
        foreach ($data['topics'] as $topics) {
    ?>
            <li>
                <a href="?ctrl=topics&method=listeMessage&id=<?= $topics->getId() ?> "> <?= $topics->getTitre() ?> </a>

                créer par <?= $topics->getUser() ?> le <?= $topics->getDatedecreation("d/m/Y") ?>
                à <?= $topics->getDatedecreation("H:i:s") ?>
                <?php
                if (!$topics->getCloture()) {
                    if ($topics->getResolue()) {
                    ?>
                        <p>le sujets est résolut </p>
                    <?php
            
                    }
                } else {
                ?>
                    <p>le sujets est clot </p>
                <?php
                }
                ?>
            </li>
    <?php
        }
    }
    ?>
</ul>