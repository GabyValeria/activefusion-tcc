<?php
session_start();
include('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    // Verificar se o email e senha estão corretos
    $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = md5('$senha')";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['email'] = $email;
        header('Location: dashboard.php');
    } else {
        echo "<script>alert('Email ou senha incorretos!'); window.location.href='../login.html';</script>";
    }
} else {
    header('Location: ../login.html');
}
?>
