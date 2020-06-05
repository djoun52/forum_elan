<?php
// var_dump($data);
//  var_dump($data['message']["0"]);
// var_dump($_SESSION);
?>
<h2> topics : <?= $_SESSION['topics']->getTitre()   ?> </h2>
<?php
if (!$_SESSION["topics"]->getCloture()) {
  if (!$_SESSION["topics"]->getResolue()) {

?>
    <a class="btn btn-success" href="?ctrl=topics&method=resolveTopic&id=<?= $_SESSION["topics"]->getId() ?>" role="button">sujets résolue ?</a>
  <?php
  } else {
  ?>
    <p>le sujets est résolut </p>
  <?php
  }
  ?>
  <a class="btn btn-danger" href="?ctrl=topics&method=EndTopic&id=<?= $_SESSION["topics"]->getId() ?>" role="button">clore le sujets ?</a>
<?php
} else {
?>
  <p>le sujets est clot </p>
<?php
}

foreach ($data['message'] as $message) {
if ($data['idmessage'] != null) {
  if ($data['idmessage'] ==  $message->getId()) {
?>
    <form action="?ctrl=topics&method=editMessage&id=<?= $message->getId() ?>" method="post">
    <div class="form-group">
      <textarea class="form-control" id="mytextarea" name="message" id="message" rows="3"><?= $message->getTexte() ?></textarea>
    </div>

    <input type="hidden" name="csrf_token" value="<?=$csrf_token?>"  >
    <button type="submit" class="btn btn-warning">modifier</button>
  </form>
  <?php
  }else{
    ?>
    <li> message poster par <?= $message->getUser()->getPseudo() ?> le <?= $message->getDatedecreation("d/m/Y") ?>
    à <?= $message->getDatedecreation("H:i:s") ?>
    <p> <?= $message->getTexte() ?></p>
  <?php
  }
}else{
  ?>
  <li> message poster par <?= $message->getUser()->getPseudo() ?> le <?= $message->getDatedecreation("d/m/Y") ?>
    à <?= $message->getDatedecreation("H:i:s") ?>
    <p> <?= $message->getTexte() ?></p>
    <a class="btn btn-danger" href="?ctrl=topics&method=supMessage&id=<?= $message->getId() ?>">suprimer le message</a>
      
    <form action="?ctrl=topics&method=listeMessage&id=<?= $message->getTopics()->getId() ?>" method="post">
      <input type="hidden" name="idmessage" value="<?= $message->getId() ?>">
      <input type="hidden" name="csrf_token" value="<?=$csrf_token?>"  >
      <button type="submit" class="btn btn-warning">modifier le message</button>
    </form>
  </li>
  <?php
  }
?>


  

<?php
  
}

if (!$_SESSION["topics"]->getCloture()) {
  if ($data['idmessage'] == null) {
 
  
?>


  <form action="?ctrl=topics&method=addMessage" method="post">
    <div class="form-group">
      <h4> <label for="message">poster un nouveau message</label></h4>
      <textarea class="form-control" id="mytextarea" name="message" id="message" rows="3"></textarea>
    </div>

    <input type="hidden" name="csrf_token" value="<?=$csrf_token?>"  >
    <button type="submit" class="btn btn-primary">poster</button>
  </form>

<?php
  }
}
