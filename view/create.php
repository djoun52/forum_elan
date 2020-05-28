
<?php
  
//    var_dump($_SESSION);

?>



<h1>créer un topic</h1>



<a href="?ctrl=home&method=reserche">rechercher un topic </a>


<form action="?ctrl=create&method=create" method="post">
<div class="form-group">
    <label for="titre">titre topic</label>
    <input class="form-control" type="text" id="titre" >
  
  </div>
  <div class="form-group">
    <label for="categorie">categorie</label>
    <input class="form-control" type="text" id="categorie">
  </div>
  <div class="form-group">
    <label for="message">1er message</label>
    <textarea class="form-control" id="message" rows="3"></textarea>
  </div>


<button type="submit" class="btn btn-primary">Submit</button>
</form>