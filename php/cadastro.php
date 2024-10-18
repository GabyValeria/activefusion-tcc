<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "activefusion";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber e filtrar os dados
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    
    // Criptografar a senha antes de armazená-la
    $senha_criptografada = password_hash($senha, PASSWORD_BCRYPT);
    
    // Inserir os dados no banco de dados
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha_criptografada')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso! <a href='login.html'>Clique aqui para fazer login</a>";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Fechar conexão
$conn->close();
?>
