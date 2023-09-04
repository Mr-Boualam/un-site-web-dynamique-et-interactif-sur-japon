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
    
    <h1 class="bonjour">Bonjour Mr.Boualam abdellah</h1>
    <div class="admin">

      <table class="table ">

        <thead>
          <tr>
            <th>#ID</th>
            <th>Titre</th>
            <th>Resume</th>
            <th>Contenu</th>
            <th>Date</th>
            <th>Img</th>
            <th>Opérations</th>
          </tr>
        </thead>

        <tbody>
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

        $contenunews = $conn->query('SELECT * FROM news ');

				while($ligne = $contenunews->fetch()){
					echo '<tr>';

						echo '<td>';
							echo $ligne['id_news'];
						echo '</td>';

						echo '<td>';
							echo $ligne['titre'];
						echo '</td>';

						echo '<td class="columnR">';
							echo $ligne['resume'];
						echo '</td>';

						echo '<td class="columnC">';
							echo $ligne['contenu'];
						echo '</td>';

            echo '<td>';
							echo $ligne['date_publication'];
						echo '</td>';

            echo '<td class="columnI">';
							echo $ligne['img'];
						echo '</td>';

            echo '<td>';
						   ?>
               <a href="afficher_admin.php?id_news=<?php echo $ligne['id_news']; ?>" class="operation-buttonA">Afficher</a>
               <a href="modifier.php?id_news=<?php echo $ligne['id_news']; ?>" class="operation-buttonM">Modiffier</a>
               <a href="supprimer.php?id_news=<?php echo $ligne['id_news']; ?>" onclick="return confirm('Voulez vous vraiment supprimer la news <?php echo $ligne['titre'] ?>');" class="operation-buttonS">Supprimer</a>
               <?php
						echo '</td>';

					echo '</tr>';
				}echo '</tbody>'; 

			echo '</table>';

      ?>
      
      <div class="btnspace">
        <a href="ajouter.php" class="button_Ajouter">Ajouter <i class="fa-solid fa-plus"></i></a>
      </div>

    </div>
  </main>

  <footer class="footerAd">
    <p>copyright <span>©</span> Boualam <span>2014-2015</span></p>
  </footer>

</body>
</html>