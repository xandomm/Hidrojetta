<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['btn-cadastrar'])){
    $nome =filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email =filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);;
    $numero =filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
    $mensagem = filter_var($_POST['message'],FILTER_SANITIZE_SPECIAL_CHARS);

require_once('PHPMailer-master/src/PHPMailer.php');
require_once('PHPMailer-master/src/SMTP.php');
require_once('PHPMailer-master/src/Exception.php');



$mail = new PHPMailer(true);
//conf de recebimento dos dados 


//php mailer conf

try{
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth= true;
    //dados email que ira enviar
    $mail->Username = "testeemailhomerotech@gmail.com";
    $mail->Password = "homero2324";
    $mail->Port =587;

    $mail->setFrom('testeemailhomerotech@gmail.com');
    //email que vai receber
    $mail->addAddress('contato@hidrojetta.com');

    $mail->isHTML(true);
    $mail->Subject='Parabens, um novo cliente deseja entrar em contato com voce';
    $mail->Body = "<strong>Nome:</strong> $nome <br><strong>Email:</strong> $email <br><strong>Numero:</strong> $numero <br><strong>Mensagem: </strong>$mensagem";
    $mail->altBody='Formulario do site!';

    if($mail->send()){
        header('Location: index.php');
    } else {
        echo 'email nao enviado';
    }
}catch(Exception $e) {
    echo "Erro ao enviar msg: " {$mail->ErrorInfo};
}
$sql = "INSERT INTO clientes (nome, email, numero, mensagem) VALUES ('$nome','$email','$numero','$mensagem')";
    $resultado = mysqli_query($connect, $sql);
    if(mysqli_insert_id($connect)):
        $_SESSION['msg']="Usuario cadastrado com sucesso";
        header('Location: index.php');
    else:
        header('Location: ../index.php');
    endif;
}
?>