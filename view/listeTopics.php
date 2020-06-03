<h2>Liste des topics</h2>

<?php
// var_dump($data["topics"]);
?>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">titre</th>
            <th scope="col">créateur</th>
            <th scope="col">date de création </th>
            <th scope="col">catégorie </th>
            <th scope="col">nbmesage  </th>
            <th scope="col">statue </th>
            <th scope="col">dernier message poster </th>
        </tr>
    </thead>
    <tbody>
       
            <?php
        if ($data['topics']) {
            foreach ($data['topics'] as $topics) {
            ?> 
            <tr>
            <td><a href="?ctrl=topics&method=listeMessage&id=<?= $topics->getId() ?> "> <?= $topics->getTitre() ?> </a></td>
            <td>
                <?= $topics->getUser() ?>
            </td>
            <td>
                <?= $topics->getDatedecreation("d/m/Y") ?>
                à <?= $topics->getDatedecreation("H:i:s") ?>
            </td>
            <td>
                <a href="?ctrl=reserche&method=reserchelink&categorie=<?= $topics->getCategorie()->getNom() ?> "><?= $topics->getCategorie()->getNom()?> </a>
            </td>
            <td>
                <?= $topics-> getNbmessage()?>
            </td>
            <td>
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
            </td>
            <td>
                <?= $topics->getLastMessage() ?>
            </td>

            </tr>
            <?php }}?>
        
        
        
            
      
        
      
        
        
        
     
       
        
        
    </tbody>
</table>
       