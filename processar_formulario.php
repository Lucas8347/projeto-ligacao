<?php
// Conecta ao banco de dados
$servername = "localhost";
$username = "root";
$password = "707070";
$dbname = "formulario_contato";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
  die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Recebe os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

// Prepara a declaração SQL e insere os dados na tabela
$stmt = $conn->prepare("INSERT INTO mensagens (nome, email, mensagem) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nome, $email, $mensagem);

if ($stmt->execute()) {
  echo "Obrigado por entrar em contato!";
} else {
  echo "Erro ao inserir os dados no banco de dados: " . $conn->error;
}

$stmt->close();
$conn->close();
?>