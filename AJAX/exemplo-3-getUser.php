<?php

  /* Header necessario para que a requisicao feita identifique a aplicacao */
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  // Dados do Banco de Dados
  $servername = "localhost";
  $username   = "root";
  $password   = "root";
  $db_name    = "exemplo_tres";

  // Conectando com o Banco
  $conn = new mysqli($servername, $username, $password, $db_name);

  // Testando conexao
  if ($conn->connect_error){
    die ("Conection fail :(");
    // die ("Fail:" . connect_error);
  }

  $name = trim($_REQUEST["name"]);
  $out = NULL;

  if ($name != ""){

    $sql = "select * from contatos where nome = '" . $name . "'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0){
      $out = '{ ';
      while ($row = $result->fetch_assoc()){
        $out .= '"userId":"'   . $row["id"] . '", ';
        $out .= '"nome":"'     . $row["nome"] . '", ';
        $out .= '"email":"'    . $row["email"] . '", ';
        $out .= '"telefone":"' . $row["telefone"] . '" ';
      }
      $out .= '}';
    }

  }

  echo ($out == NULL) ? '"status": false' : $out;
?>
