<?php
session_start();
session_destroy();
header("Location: extranet.php");
exit();
?>
