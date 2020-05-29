


<?php
     var_dump($data);
?>


<form action="?ctrl=topics&method=addMessage" method="post">
<div class="form-group">
    <label for="message">votre message</label>
    <textarea class="form-control" name="message" id="message" rows="3"></textarea>
  </div>


  <button type="submit" class="btn btn-primary">poster</button>
</form>