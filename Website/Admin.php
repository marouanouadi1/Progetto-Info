<?php
session_start();
include_once("session.php");
include_once("dal.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $word=Trim($_POST['search2']);
  $regex= "/([^0-9'])/";
  if(preg_match($regex, $word)||empty($word)){
    echo "<script type='text/javascript'>alert('inserire Id');</script>";
  }
  if(isset($_POST['modify']))
  {
    $_SESSION['id']=$word;
    header("location:modifica.php");
    exit();
  }
  elseif(isset($_POST['add'])){
    header("location:Aggiungi.php");
    exit();
  }
  else{
    EliminaRiga($_POST['search2']);
  }
}
?>
<html lang="en">
<head>
<meta name="description" content="Bootstrap.">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="javascript/scripts.js">



</script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
  
</head>
<body>
<h1 class="Titolo">
        If you are bored, you are in the right place😁
</h1>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
  <i class="Nome">My Dictionary</i>
  <ul class="navbar-nav ml-auto">
    <li class="active">
      <a class="nav-link" href="Logout.php">Logout</a>
    </li>
    <li class="active">
      <a class="nav-link" href="">Contact</a>
    </li>
  </ul>
</nav>
<br><br><br>
<div class="container">
  <div class="row header">
  </div>
  <table id="myTable" >
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Word</th>
      <th scope="col">Word Type</th>
      <th scope="col">Meaning</th>
    </tr>
  </thead>
  <tbody>
  <?php Caricaretabella()?>
  </tbody>
</table>    
</div>
<br>


<form class="example"method="POST" style="margin:auto;max-width:500px;">
<label >Inserire Id della parola da eliminare o modificare</label>
<input style="width:100%;" id="id1" type="text" placeholder="search" name="search2"><br>
<button style="width:33%;" class="btn btn-primary" type="submit" name="modify">Modifica</button>
<button style="width:33%;" class="btn btn-primary" type="submit" name="delete">Elimina</button>
<button style="width:33%;" class="btn btn-primary" type="submit" name="add">Aggiungi</button>
</form>

</body>

<script>
$(document).ready(function(){
  $('#myTable').dataTable();
});

document.onkeypress = stopRKey;

</script>

</html>
