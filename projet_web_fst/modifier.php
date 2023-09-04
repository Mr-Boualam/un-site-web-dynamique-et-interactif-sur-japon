<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "test_login";

try{
  $conn = mysqli_connect($server,$user,$password,$db);
}catch(Exception $e){
  echo 'Erreur de connexion: ' . $e->getMessage();
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
    
  <?php
  $id_news = $_GET['id_news'];
  $update = "SELECT * FROM news WHERE id_news = $id_news";
  $updatequery = mysqli_query($conn, $update);
  $result = mysqli_fetch_assoc($updatequery);
  
  
  if(isset($_POST['submit'])){
      $id_news = $_GET['id_news'];
      $titre = mysqli_real_escape_string($conn, $_POST['titre']);
      $resume = mysqli_real_escape_string($conn, $_POST['resume']);
      $contenu = mysqli_real_escape_string($conn, $_POST['contenu']);
      $insertquery =  "UPDATE news SET titre ='$titre', resume ='$resume', contenu ='$contenu' WHERE id_news = $id_news";
      $mysqliquery = mysqli_query($conn, $insertquery);

      
      if($insertquery){
          
        header("Location: admin.php?bien=news-est-modifier");
        exit();
  
      }else{
        header("Location: modifier.php?error");
        exit();
      }
  
  
  
  }
  ?>
  <div class="container">
    <div class="plan">

      <h1>Modifier un news</h1>

      <?php
      $select_query = "SELECT * FROM news WHERE id_news = $id_news";
      $result = mysqli_query($conn, $select_query);
      $conntenu_news = mysqli_fetch_assoc($result);
      //var_dump($conntenu_news);
      ?>

      <form method="POST" action="" >
        <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <?php if (isset($_GET['bien'])) { ?>
          <p class="bien"><?php echo $_GET['bien']; ?></p>
        <?php } ?>

        <label >id</label>
        <input readonly type="text" id="titre" name="titre" value="<?php echo $conntenu_news['id_news'] ?>">

        <label >titre</label>
        <input type="text" id="titre" name="titre" value="<?php echo $conntenu_news['titre'] ?>">

        <label >resume</label>
        <input type="text" id="resume" name="resume" value="<?php echo $conntenu_news['resume'] ?>">

        <label >contenu</label>
        <input type="text" id="contenu" name="contenu" value="<?php echo $conntenu_news['contenu'] ?>">

        <label >Image</label>
        <input type="file" id="img" name="img">

        <div>
          <button type="submit" name="submit" class="btn_login">modifier</button>
        </div>
      </form>

    </div>
    <a href="admin.php" class="btn_fermer">&times;</a>
  </div>

  </main>

  <footer class="footer">
    <p>copyright <span>©</span> Boualam <span>2014-2015</span></p>
  </footer>

</body>
</html>