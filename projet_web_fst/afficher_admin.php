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

if (isset($_GET['id_news'])) {
  $newsId = $_GET['id_news'];
  $query = "SELECT * FROM news WHERE id_news = ?";
  $stmt = $conn->prepare($query);
  $stmt->execute([$newsId]);
  $news = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <!-- =============== SCRIPT =============== -->
  <script src="https://kit.fontawesome.com/d4d2395186.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script link="contact.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&display=swap" rel="stylesheet">
  <title>Projet-WEB-FST</title>
</head>
<body>
  
  <header>

    <div class="container">
      <a href="accueil.php"><img src="img/Logo.png" alt="Logo"><span>JAPON</span></a>
      <ul>
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="plan.php">Plan de site</a></li>
        <li><a href="qui_somme.php">Qui somme nous ?</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <a href="parametre.php" class="btn_par"><i class="fa-solid fa-gear"></i></a>
      <a href="login.php" class="btn_login">Déconnexion</a>
    </div>

  </header>

  <main>
    
    <div class="container">
      <div class="plan">

        <h1><?php echo $news['titre']; ?></h1>
        <img class="img" src="img/<?php echo $news['img']; ?>">
        <h5>resume:</h5>
        <p><?php echo $news['resume']; ?></p>
        <h5>contenu:</h5>
        <div class="news-content">
          <?php echo $news['contenu']; ?>
        </div>
        <p class="date">Date: <?php echo $news['date_publication']; ?></p>

      </div>
      <a href="admin.php" class="btn_fermer">&times;</a>
  </div>

  </main>

  <footer class="footer">
    <p>copyright <span>©</span> Boualam <span>2014-2015</span></p>
  </footer>

</body>
</html>