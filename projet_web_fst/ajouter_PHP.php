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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function validate($data){
  $data = trim($data);  
  $data = stripslashes($data); 
  $data = htmlspecialchars($data); 
  return $data;
}

if (isset($_POST['titre']) && isset($_POST['resume']) && isset($_POST['contenu'])){

  $titre = validate($_POST['titre']);
  $resume = validate($_POST['resume']);   
  $contenu = validate($_POST['contenu']);

  //tritement d'image
  $filename = '';
  if (!empty($_FILES['img']['name'])) {
      $image = $_FILES['img']['name'];
      $filename = uniqid() . $image;
      move_uploaded_file($_FILES['img']['tmp_name'], 'img/' . $filename);
  }

  if (empty($titre)){

    header("Location: ajouter.php?error=titre-is-required");
    exit();
 
  }else if(empty($resume)){
 
    header("Location: ajouter.php?error=resume-is-required");
    exit();
 
  }else if(empty($contenu)){
 
    header("Location: ajouter.php?error=contenu-is-required");
    exit();
 
  }else{
 
    $date = date('Y-m-d');
    $insertion_news = $conn->prepare('INSERT INTO news(titre,resume,contenu,date_publication,img) VALUES(?,?,?,?,?)');
    $insertion_news->execute(array($titre,$resume,$contenu,$date,$filename));
 
    // Envoi des notifications aux utilisateurs inscrits
    $users_query = $conn->query("SELECT email FROM internaute");  
    $users = $users_query->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($users as $user) {
      $to = $user['email'];
      $subject = "Nouvelle actualité disponible";
      $message = "Une nouvelle actualité a été ajoutée sur notre site. Consultez-la dès maintenant !";
      
      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'tls';
      $mail->Host = 'smtp.gmail.com'; // Remplacez par le serveur SMTP
      $mail->Port = 587;
      $mail->Username = 'projetwebfst@gmail.com'; // Remplacez par votre nom d'utilisateur SMTP
      $mail->Password = 'kngfjuftecfndfxq'; // Remplacez par votre mot de passe SMTP
      
      $mail->setFrom('projetwebfst@gmail.com', 'Your Name');
      $mail->addAddress($to);
      $mail->Subject = $subject;
      $mail->Body = $message;
      
      if ($mail->send()) {
          echo "Notification envoyée à $to avec succès.";
      } else {
          echo "Échec de l'envoi de la notification à $to. Erreur : " . $mail->ErrorInfo;
      }
  }
    header("Location: ajouter.php?bien=news-est-ajouter");
 
  }    

}else{
  header("Location: ajouter.php?error");
  exit();
}
?>
 