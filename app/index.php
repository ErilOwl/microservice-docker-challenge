<?php
// Inicia a conexão PHP ocm o banco de dados de MySql

ini_set("display_errors", 1);
header('Content-Type: text/html; charset=utf-8');

// Inclui os dados do arquivo conect.php

include 'conect.php';

$result = $link->query("SELECT * FROM dados ORDER BY AlunoID DESC");
?>

//Como já havia alguma experiência prévia com html e CSS implementar uma melhoria de visual

<html>
<head>
<title>Lista de Alunos</title>
<style>
    table { border-collapse: collapse; width: 80%; margin: 20px auto; }
    th, td { border: 1px solid #333; padding: 8px; text-align: center; }
    th { background-color: #f2f2f2; }
</style>
</head>
<body>

<h2 style="text-align:center;">Registros no Banco de Dados de Alunos</h2>

//Usa  os dados do banco de dados e os apresenta

<?php if ($result->num_rows > 0) { ?>
    <table>
        <tr>
            <th>ID</th><th>Nome</th><th>Sobrenome</th><th>Endereço</th><th>Cidade</th><th>Host</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["AlunoID"]; ?></td>
                <td><?php echo $row["Nome"]; ?></td>
                <td><?php echo $row["Sobrenome"]; ?></td>
                <td><?php echo $row["Endereco"]; ?></td>
                <td><?php echo $row["Cidade"]; ?></td>
                <td><?php echo $row["Host"]; ?></td>
            </tr>
        <?php } ?>
    </table>
<?php } else { ?>
    <p style="text-align:center;">Nenhum registro encontrado.</p>
<?php } ?>

</body>
</html>

<?php
$link->close();
?>
