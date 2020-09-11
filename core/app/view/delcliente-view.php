<?php


$cliente = ClienteData::getById($_GET["id"]);
$cliente->del();

Core::redir("./index.php?view=cliente");
?>