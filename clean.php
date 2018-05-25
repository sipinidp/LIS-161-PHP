<?php
    // save this as clean.php
    function clean($str) {
       $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
       $str = @trim($str);
       if(get_magic_quotes_gpc()) {
              $str = stripslashes($str);
       }
       return mysqli_real_escape_string($link, $str);
    }
?>
