<?php
session_start();
include_once("db_connect.php");

if(isset($_POST['btn-cadastrar'])):
    $nome = mysqli_escape_string($connect, $_POST['name']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $numero = mysqli_escape_string($connect, $_POST['phone']);
    $mensagem = mysqli_escape_string($connect, $_POST['message']);

    $sql = "INSERT INTO clientes (nome, email, numero, mensagem) VALUES ('$nome','$email','$numero','$mensagem')";
    $resultado = mysqli_query($connect, $sql);
    if(mysqli_insert_id($connect)):
        $_SESSION['msg']="Usuario cadastrado com sucesso";
        header('Location: PHPMailer/');
    else:
        header('Location: ../contato.php');
    endif;
endif;