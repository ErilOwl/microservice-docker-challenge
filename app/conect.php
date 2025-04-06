<?php

//Coleta as variáveis para conexão com o banco de dados de MySql

$servername = "db";
$username = getenv("MYSQL_USER") ?: "root";
$password = getenv("MYSQL_PASSWORD") ?: "Senha123";
$database = getenv("MYSQL_DATABASE") ?: "meubanco";

//Cria a variável $link para conexão com o banco de dados em MySql

$link = new mysqli($servername, $username, $password, $database);

//Retrona em caso de erros de conexão

if ($link_connect_error) {
    print("Erro na conexão: %S/n", $link_connect_error);
}

//Gera valores randomicos  no banco de dados (forma de testar a conexão)

$valor_rand1 = rand(1, 999);
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
$host_name = gethostname();

//Insere os dados no formato nescessário CSV no banco de dados.

$query = "INSERT INTO dados (AlunoID, Nome, Sobrenome, Endereco, Cidade, Host) 
          VALUES ('$valor_rand1', '$valor_rand2', '$valor_rand2', '$valor_rand2', '$valor_rand2', '$host_name')";

if ($link->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $link->error;
}

error_log("Host: $host_name inseriu dados no banco.\n", 3, "/var/www/html/app.log");
?>
