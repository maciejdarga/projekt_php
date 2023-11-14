<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php"); // Przekierowanie na stronę główną po wylogowaniu
?>
