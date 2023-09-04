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

      <h1>Parametre</h1>
      <form action="parametre_PHP.php" method="post">
        <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <?php if (isset($_GET['bien'])) { ?>
          <p class="bien"><?php echo $_GET['bien']; ?></p>
        <?php } ?>
        <label for="current_password">Current Password:</label>
        <input type="password" name="op" id="op"><br>
        
        <label for="new_password">New Password:</label>
        <input type="password" name="np" id="np"><br>
        
        <label for="confirm_password">Confirm New Password:</label>
        <input type="password" name="c_np" id="c_np"><br>
        
        <button type="submit" name="submit" class="btn_login">Change Password</button>
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