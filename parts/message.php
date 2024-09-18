<?php

  if(isset($_SESSION["message"]) && isset($_SESSION["color"]) && $_SESSION["message"] != "" && $_SESSION["color"] != ""){
    echo '<div style="text-align: center;" class="alert alert-',$_SESSION["color"],'" alert-dismissible fade show" role="alert">
        <strong>',$_SESSION["message"],'</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';

    unset($_SESSION["message"]);
    unset($_SESSION["color"]);
  }
?>