<?php
$file = 'data/users/' . $_GET['id'] . '.json';
unlink($file);
header("Location:/user");
exit;
//require "delete.html";
