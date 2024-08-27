<?php
session_start();
session_unset();
session_destroy();
header("location: /noctyx/client/pages/login.php");
exit();
?>