<?php

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  //Dados necessarios para a conexao com o banco de dados
  $servername = "localhost";
  $username   = "root";
  $password   = "root";
  $db_name    = "exemplo_cinco";

  //Criando o objeto de conexao
  $conn = new mysqli($servername, $username, $password, $db_name);

  //Testando a conexao
  if ($conn->connect_error) {
      die("Connection failed :(");
      //Mostra o Error
      //die("Connection failed: " . $conn->connect_error);
  }

  /*
   * Note on the object-oriented example above:
   * $connect_error was broken until PHP 5.2.9 and 5.3.0.
   * If you need to ensure compatibility with PHP versions prior to 5.2.9 and 5.3.0,
   * use the following code instead:
   *
   *  // Check connection
   *  if (mysqli_connect_error()) {
   *      die("Database connection failed: " . mysqli_connect_error());
   *  }
   */

  //Definindo o comando sql
  $sql = "select nome, email, telefone from contatos";
  //Executando a consulta
  $result = $conn->query($sql);

  //Teve resultado?
  $out = NULL;
  if ($result->num_rows > 0){
    $out = '[';
    while ($row = $result->fetch_assoc()){

      if ($out != "[") {
        $out .= ",";
      }

      $out .= '{ "nome": "'     . $row["nome"]     . '", ' .
                '"email": "'    . $row["email"]    . '", ' .
                '"telefone": "' . $row["telefone"] . '" }';
    }
    $out .= ']';
  }

  $conn->close();

  echo ($out);
?>
