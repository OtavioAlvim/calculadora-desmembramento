<?php
// Inicie a sessão (se ainda não estiver iniciada)
session_start();
session_regenerate_id(true);
// Obtenha o ID da sessão atual
$_SESSION['nome'] = $_POST['nome'];
$_SESSION['id'] = session_id();
header('location: ../menu.php');
?>