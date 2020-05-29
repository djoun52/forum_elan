<ul>
    <?php
        //   var_dump($data);
          foreach($data['users'] as $user){
              ?>
              <li><?= $user->getTitre()?> - 
                  créer  depuis le <?= $user->getDatedecreation("d/m/Y")?>
                  à <?= $user->getDatedecreation("H:i:s")?>
              </li>
              <?php
          }
    ?>
</ul>