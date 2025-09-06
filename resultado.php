<?php
//recuperando dados do formulário
$nomeAluno = $_POST["nomeAluno"] ?? '';
$matricula_Aluno_raw = trim($_POST["matricula_Aluno"] ?? '');
$nota1_raw = $_POST['nota1'] ?? '';
$nota2_raw = $_POST['nota2'] ?? '';


$erros = [];
//Validação de nome (não pode estar vazio e não pode conter números ou caracteres especiais)
if ($nomeAluno ==='') {
    $erros[] = "O nome do aluno é obrigatório.";
}elseif (!preg_match('/^[A-Za-zÀ-ÿ\s]+$/', $nomeAluno)) {
    $erros[] = "O nome do aluno não pode conter números ou caracteres especiais.";
}
//Validação de matrícula (deve ser númerica e ter exatamente 8 dígitos)
if (!preg_match('/^[0-9]{8}$/', $matricula_Aluno_raw)) {
    $erros[] = "Matrícula inválida. Deve conter exatamente 8 dígitos.";
}

//Convertendo matrícula para inteiro
$nota1_raw = str_replace(',', '.', $nota1_raw);
$nota2_raw = str_replace(',', '.', $nota2_raw);

//Validação de notas
if ($nota1_raw === ''|| !is_numeric($nota1_raw)) {
    $erros[] = "Nota 1 inválida. Deve conter números.";
} else {
    $nota1_raw = (float) $nota1_raw;
    if ($nota1_raw < 0 || $nota1_raw > 10) $erros[] = "Nota 1 deve estar entre 0 e 10.";
}

if ($nota2_raw === '' || !is_numeric($nota2_raw)) {
    $erros[] = "Nota 2 inválida. Deve conter números.";
} else {
    $nota2_raw =(float) $nota2_raw;
    if ($nota2_raw < 0 || $nota2_raw > 10) $erros[] = "Nota 2 deve estar entre 0 e 10";
}
// Se houver erros, exibe mensagens e interrompe o processamento
if (!empty($erros)) {
    echo "<h2>Erros encontrados:</h2><ul>";
    foreach ($erros as $e) {
        echo "<li>" . htmlspecialchars($e) . "</li>";
    }
    echo "</ul>";
    echo '<p><a href="/backend/medialuno.php">Voltar ao formulário</a></p>';
    exit;
}
//Cálculo da média e determinação do status
$media = ($nota1_raw + $nota2_raw)/2;
 if($media >= 7){
    $status = "Aprovado";
} elseif ($media <= 4 && $media < 7){
 $status = "Prova final";   
 } else {
 $status = "Reprovado";
 }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style2.css">
  <title>Resultado do Aluno</title>
</head>
<body>
  <div class="container">
    <h2>Resultado</h2>
    <p><strong>Nome:</strong> <?php echo htmlspecialchars($nomeAluno); ?></p>
    <p><strong>Matrícula:</strong> <?php echo htmlspecialchars($matricula_Aluno_raw); ?></p>
    <p><strong>Média:</strong> <?php echo number_format($media, 2, ',', '.'); ?></p>
    <p><strong>Status:</strong> <?php echo $status; ?></p>
    <a href="formulario.php">Voltar ao formulário</a>
  </div>
</body>
</html>