<?php
$file = 'data/doc/' . $_GET['id'] . '.json';
unlink($file);
header("Location:listDoc.php");
exit;
require "delete.html";
