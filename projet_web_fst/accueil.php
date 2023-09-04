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
      <a href="login.php" class="btn_login">Login</a>
    </div>
  </header>

  <main>
    
    <div class="container">

      <div class="explore">
        <h1><span>E</span> X P L O R E <span>:</span></h1>
            <ul>
              <li><a class="button" href="sites_monuments.php"><i class="fa-solid fa-landmark"></i>SITES ET MONUMENTS</a></li>
              <li><a class="button" href="index_villes.php"><i class="fa-regular fa-image"></i>INDEX DES VILLES</a></li>
              <li><a class="button" href="https://www.google.com/maps/place/%D8%A7%D9%84%D9%8A%D8%A7%D8%A8%D8%A7%D9%86%E2%80%AD/@31.6711513,158.6139477,4z/data=!4m6!3m5!1s0x34674e0fd77f192f:0xf54275d47c665244!8m2!3d36.204824!4d138.252924!16zL20vMDNfM2Q?entry=ttu"><i class="fa-solid fa-map-location-dot"></i>GOOGLE MAP</a></li>
              <li><a class="button" href="liens.php"><i class="fa-solid fa-link"></i></i>LIENS UTILES</a></li>
            </ul>
      </div>

      <div class="welcome">
        <h3>welcome to</h3>
        <h1>JAPON</h1>
      </div>

      <div class="video-news">
        <video src="img/video-home.mp4" controls width="300px"></video>
        <div class="php">

          <div class="inscrire">
            <h5>Soyez Notifié : s'inscrire-vous pour les Dernières Mises à Jour !</h5>
            <a href="inscrire.php">s'inscrire</a>
          </div>
          <h1>News</h1>
          
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
             
            $contenunews = $conn->query('SELECT * FROM news ORDER BY date_publication DESC LIMIT 3');
            
            while ($ligne = $contenunews->fetch()) {
                echo '<div >';
                echo '<a  href="afficher_news.php?id_news='. $ligne['id_news'] .' " class="news1">Date: <span>' . $ligne['date_publication'] . '</span> <br>' ;
                echo 'Titre:<br>' . $ligne['titre'] . '</a>' ;
                echo '</div>';
            }
          ?>
          <a href="afficher_tous.php" class="btn_news">afficher tous news</a>
            
        </div>
      </div>

    </div>

  </main>

  <footer class="footer">
    <p>copyright <span>©</span> Boualam <span>2014-2015</span></p>
  </footer>

</body>
</html>