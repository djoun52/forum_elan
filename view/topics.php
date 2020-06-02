


<?php
// var_dump($data);
//  var_dump($data['message']["0"]);
// var_dump($_SESSION);
?>
<h2> topics : <?= $_SESSION['topics']->getTitre()   ?> </h2> 
<?php
if(!$_SESSION["topics"]->getCloture() ){
  if (!$_SESSION["topics"]->getResolue()){

?>
<a class="btn btn-success" href="?ctrl=topics&method=resolveTopic&id=<?=$_SESSION["topics"]->getId() ?>" role="button">sujets résolue ?</a>
  <?php 
  }else{
  ?>
  <p>le sujets est résolut </p>
  <?php
}
?>
<a class="btn btn-danger" href="?ctrl=topics&method=EndTopic&id=<?=$_SESSION["topics"]->getId() ?>" role="button">clore le sujets ?</a>
<?php
 }else{
  ?>
  <p>le sujets est clot </p>
  <?php
}

foreach ($data['message'] as $message) {
?>



 

  <li> message poster par <?= $message->getUser()->getPseudo() ?> le <?= $message->getDatedecreation("d/m/Y") ?>
    à <?= $message->getDatedecreation("H:i:s") ?>
    <p> <?= $message->getTexte() ?></p>
    <a href="?ctrl=topics&method=supMessage&id=<?= $message->getId() ?>">suprimer le message</a>
  </li>

<?php
}

if(!$_SESSION["topics"]->getCloture() ){
?>


<form action="?ctrl=topics&method=addMessage" method="post">
  <div class="form-group">
    <label for="message">poster un nouveau message</label>
    <textarea class="form-control" id="mytextarea" name="message" id="message" rows="3"></textarea>
  </div>


  <button type="submit" class="btn btn-primary">poster</button>
</form>

<?php 
}