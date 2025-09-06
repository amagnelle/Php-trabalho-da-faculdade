<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsividade -->
    <title>Indicador de média</title> <!-- Título da página -->
    <link rel="stylesheet" href="style.css"> <!-- Importa o CSS -->
</head>
<body> 
    <div class="container"> <!-- Box centralizada -->
        <form method="POST" action="resultado.php"> <!-- Formulário que envia para resultado.php -->
            <h1>Digite as suas notas!!😊</h1> <!-- Título do formulário -->
        
            <!-- Campo para nome do aluno -->
            <input type="text" id="nomeAluno" name="nomeAluno" placeholder="Qual é o seu nome?" required>

            <!-- Campo para matrícula do aluno -->
            <input type="number" min="0" step="any" id="numeroMatricula" name="matricula_Aluno" placeholder="Qual é a sua matrícula?" required>

            <!-- Campo para nota 1 -->
            <input type="number" min="0" step="any" id="nota1" name="nota1" placeholder="Digite nota 1" required>
        
            <!-- Campo para nota 2 -->
            <input type="number" min="0" step="any" id="nota2" name="nota2" placeholder="Digite a nota 2" required>
    
            <!-- Botão para enviar o formulário -->
            <input type="submit" name="enviar" id="enviar" name="botaoEnviar" value="Calcular">
        </form>
    </div>
</body>
</html>