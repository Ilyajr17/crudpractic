<?php
$file = 'data/doc/' . $_GET['id'] . '.json';
unlink($file);
header("Location:/doc");
exit;
require "delete.html";
