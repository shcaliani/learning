function showUserData(name){
  if (name == "---" || name == ""){
    document.getElementById("userData").innerHTML = "";
    return;

  }
  var xmlhttp = new XMLHttpRequest();
  var url = "http://localhost/myRepo/AJAX/exemplo-3-getUser.php?name=";

  xmlhttp.onreadystatechange = function (){
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
      var client = JSON.parse(xmlhttp.responseText);
      showClientInformation(client);
    }
  };
  xmlhttp.open("GET", (url + name), true);
  xmlhttp.send();
}// End-Function

function showClientInformation (clientJSON){
  var clientTable = "<table> <tr> <th> ID </th> <th> NOME </th> <th> E-MAIL </th> <th> TELEFONE </th> </tr>";

  clientTable += "<tr> <td>" + clientJSON.userId   + "</td>";
  clientTable +=      "<td>" + clientJSON.nome     + "</td>";
  clientTable +=      "<td>" + clientJSON.email    + "</td>";
  clientTable +=      "<td>" + clientJSON.telefone + "</td> </tr>";
  clientTable += "</table>";

  document.getElementById("clientInfo").innerHTML = clientTable;
}// End-Function

function showClientList(clientList){
  var myList = JSON.parse(clientList);
  var selectList = ' <option value="" > --- </option>';

  for (var i = 0; i < myList.length; i++){

    selectList += '<option value = "' + myList[i] + '" > ' + myList[i] + '</option>';
    /* Aqui seria melhor se fosse retornado u JSON que tivesse {id, nome}, assim no
       value da tag "option" voce poderia colocar o "id" e depois fazer a busca baseado
       no id do usuario por ser unico.*/
  }

  document.getElementById("list").innerHTML = selectList;
}// End-Function

//Show Client List
var xmlhttp = new XMLHttpRequest();
var url = "http://localhost/myRepo/AJAX/exemplo-3-getAllUsers.php";

xmlhttp.onreadystatechange = function (){
  if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
    showClientList(xmlhttp.responseText);
  }
};// End-Function

xmlhttp.open("GET", url, true);
xmlhttp.send();
