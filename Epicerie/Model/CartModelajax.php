<?php
session_start();
// session_destroy();

if (isset($_POST["values"])) {
    $_SESSION["values"] = [];
    foreach ($_POST["values"] as $post) {
        // var_dump($post);
        if (isset($_SESSION["values"])) {
            array_push($_SESSION["values"],$post);
            
        }
    }
    var_dump($_SESSION["values"]);
}else {
      echo "not posted";
  }