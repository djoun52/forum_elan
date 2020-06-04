<h2>Liste des categorie</h2>

<table class="table table-hover">
    <thead class="thead-light">
        <tr>
            <th scope="col">nom catégorie</th>
            <th scope="col">nbtopics </th>

        </tr>
    </thead>
    <tbody>
        <?php
        //  var_dump($data);
        if ($data['categorie']) {
        foreach ($data['categorie'] as $categorie) {
        ?>

            <tr>
                <td><a href="?ctrl=reserche&method=reserchelink&categorie=<?= $categorie->getNom() ?> "><?= $categorie->getNom() ?> </a> </td>
                <td>
                <?= $categorie->getNbTopics() ?>
                </td>
            </tr>
            <?php
        }}?>
        </tbody>
</table>
        
       