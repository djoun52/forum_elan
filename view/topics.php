<h2> topics : <?= $_SESSION['topics']->getTitre()   ?>  </h2>


<?php
    //  var_dump($data);
    //  var_dump($_SESSION);

     foreach ($data['message'] as $message) {
       ?>
       <li> message poster par <?= $message->getUser()->getPseudo()?> le <?= $message->getDatedecreation("d/m/Y")?>
        à <?= $message->getDatedecreation("H:i:s")?>
        <p> <?= $message->getTexte() ?></p>
        <a href="?ctrl=topics&method=supMessage&id=<?= $message->getId()?>">suprimer le message</a>
       </li>

       <?php
     }
?>


<form action="?ctrl=topics&method=addMessage" method="post">
<div class="form-group">
    <label for="message">poster un nouveau message</label>
    <textarea class="form-control" name="message" id="message" rows="3"></textarea>
  </div>


  <button type="submit" class="btn btn-primary">poster</button>
</form>