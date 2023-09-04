<?php
  $sname= "localhost";
  $unmae= "root";
  $password = "";
  $db_name = "test_login";

  try{
    $conn = new PDO("mysql:host=$sname;dbname=$db_name;port=3306;charset=utf8", $unmae, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }catch(Exception $e){
    echo 'Erreur de connexion: ' . $e->getMessage();
  }

  $id = $_GET['id_news'];
  $sqlState = $conn->prepare('DELETE FROM news WHERE id_news=?');
  $sqlState->execute(array($id));
  header('Location: admin.php'); // Rediriger après la suppression
  exit();

?>