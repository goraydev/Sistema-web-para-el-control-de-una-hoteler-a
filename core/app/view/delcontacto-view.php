<?php


$cliente = ContactoData::getById($_GET["id"]);
$cliente->del();

Core::redir("./index.php?view=cliente");
?>