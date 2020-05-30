
<?php


?>







<a href="?ctrl=home&method=reserche">rechercher un topic </a>

<h2>créer un topic  </h2>
<form action="?ctrl=create&method=creatTopics" method="post">
<div class="form-group">
    <label for="titre">titre topic</label>
    <input class="form-control" type="text" name="titre" id="titre" >
  
  </div>
  <div class="form-group">
    <label for="categorie">categorie</label>
    <input class="form-control" type="text" name="categorie" id="categorie">
  </div>
  <div class="form-group">
    <label for="message">1er message</label>
    <textarea class="form-control" name="message" id="message" rows="3"></textarea>
  </div>


<button type="submit" class="btn btn-primary">Submit</button>
</form>



<h2>créer une categorie </h2>



<form action="?ctrl=create&method=createCategorie" method="post">

<div class="form-group">
    <label for="categorie">categorie</label>
    <input class="form-control" type="text" name="categorie" id="categorie">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>