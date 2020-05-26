<ul>
    <?php
          var_dump($data);
          foreach($data['users'] as $user){
              ?>
              <li><?= $user->getTitre()?> - 
                  créer  depuis le <?= $user->getDate_de_creation("d/m/Y")?>
                  à <?= $user->getDate_de_creation("H:i:s")?>
              </li>
              <?php
          }
    ?>
</ul>