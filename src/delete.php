<?php
$file = 'data/users/' . $_GET['id'] . '.json';
unlink($file);
header("Location:list.php");
exit;
require "delete.html";
