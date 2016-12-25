<?php
  header('Access-Control-Allow-Origin: *');

  // Array com os nomes
  $a[] = "Anna";
  $a[] = "Amanda";
  $a[] = "Raquel";
  $a[] = "Cindy";
  $a[] = "Doris";
  $a[] = "Eve";
  $a[] = "Evita";
  $a[] = "Sunniva";
  $a[] = "Tove";
  $a[] = "Unni";
  $a[] = "Violet";
  $a[] = "Liza";
  $a[] = "Elizabeth";
  $a[] = "Ellen";
  $a[] = "Wenche";
  $a[] = "Vicky";

  //Pega o parametro vindo da url
  $q = trim($_REQUEST["q"]);
  $hint = "";

  //Vendo se tem alguma dica
  if ($q != ""){
    $tam = strlen($q);
    for ($i=0; $i < sizeof($a); $i++) {
      //Se um pedaco do nome eh igual ao passado por parametro
      if (strtolower(substr($a[$i], 0, $tam)) == strtolower($q)){
        if ($hint != "")
          $hint .= ", ";
        $hint .= $a[$i];
      }
    }// End-for
  }// End-if

  $hint = ($hint == "") ? "Sem Sugestoes." : $hint;
  echo ($hint);
