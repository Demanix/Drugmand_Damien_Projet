<?php
  if(!isset($_SESSION['admit'])) {
     print "ACCES RESERVE";
     print "<META http-equiv=\"refresh\": Content=\"2;URL=../index.php\">";    
     exit();
  }
?>
