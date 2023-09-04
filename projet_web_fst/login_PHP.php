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

if (isset($_POST['username']) && isset($_POST['password'])){

  function validate($data){
    $data = trim($data); // pour supprime les espaces blancs 
    $data = stripslashes($data); // pour supprime les barres obliques inverses (`\`) d'une chaîne de caractères.
    $data = htmlspecialchars($data); // pour convertit certains caractères spéciaux en entités HTML. Cette fonction est principalement utilisée pour éviter les attaques de type "Cross-Site Scripting" (XSS) 
    return $data;
  } 

  $uname = validate($_POST['username']);
	$pass = validate($_POST['password']);

  if (empty($uname)){ // empty pour voir le contenu non vide 

		header("Location: login.php?error=UserName-is-required");
	  exit();

	}else if(empty($pass)){

    header("Location: login.php?error=Password-is-required");
	  exit();

	}else{
  
    $sql = "SELECT * FROM admin WHERE username='$uname' AND password='$pass'"; 

		$reponse = $conn->query($sql); // pour pointer sur le colonees admin

    if($reponse->rowCount()>0){ // rowCont fonction pour calculer les colones 

      header('Location: admin.php');
    }else{
      header("Location: login.php?error=UserName-or-Password-is-incorrect");
	  exit();
    }
  }

}else{
  header("Location: login.php?error");
  exit();
}

?>