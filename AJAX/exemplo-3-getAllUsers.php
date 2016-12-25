<?php

  /* Header necessario para que a requisicao feita identifique a aplicacao */
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  // Dados para conexao com o Banco de Dados
  $servername = "localhost";
  $username   = "root";
  $password   = "root";
  $db_name    = "exemplo_tres";

  // Conexao
  $conn = new mysqli($servername, $username, $password, $db_name);

  // Verificando conexao
  if ($conn->connect_error){
    die("Falha ao conectar :(");
    // die ("Falha: " . connect_error);
  }

  // construindo o select;
  $sql = "select nome from contatos";

  // Executando a query
  $result = $conn->query($sql);

  $out = NULL;
  if ($result->num_rows > 0){
    $out = '[';

    while ($row = $result->fetch_assoc()){
      if ($out != '['){
        $out .= ', ';
      }
      $out .= '"' . $row["nome"] . '"';
    }// End-While

    $out .= ']';
  }// End-If

  $conn->close();

  echo ($out == NULL) ? ('["null"]') : $out;
?>
