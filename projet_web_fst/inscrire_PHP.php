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

function validate($data){
  $data = trim($data);  
  $data = stripslashes($data); 
  $data = htmlspecialchars($data); 
  return $data;
}

if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])){

  $fname = validate($_POST['fname']);
  $lname = validate($_POST['lname']);   
  $email = validate($_POST['email']);


  if (empty($fname)){

    header("Location: inscrire.php?error=first-name-is-required");
    exit();
 
  }else if(empty($lname)){
 
    header("Location: inscrire.php?error=last-name-is-required");
    exit();
 
  }else if(empty($email)){
 
    header("Location: inscrire.php?error=email-is-required");
    exit();
 
  }else{
 
    $insertion_internaute = $conn->prepare('INSERT INTO internaute(fname,lname,email) VALUES(?,?,?)');
    $insertion_internaute->execute(array($fname,$lname,$email));
 
    header("Location: inscrire.php?bien=bien-succes");
 
  }    

}else{
  header("Location: inscrire.php?error");
  exit();
}
?>
 