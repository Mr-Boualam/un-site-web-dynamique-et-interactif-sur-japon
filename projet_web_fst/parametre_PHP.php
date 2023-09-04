<?php 
// $sname= "localhost";
// $unmae= "root";
// $password = "";
// $db_name = "test_login";

// try{
//   $conn = new PDO("mysql:host=$sname;dbname=$db_name;port=3306;charset=utf8", $unmae, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// }catch(Exception $e){
//   echo 'Erreur de connexion: ' . $e->getMessage();
// }

// if (isset($_POST['op']) && isset($_POST['np'])
//     && isset($_POST['c_np'])) {

// 	function validate($data){
//        $data = trim($data);
// 	   $data = stripslashes($data);
// 	   $data = htmlspecialchars($data);
// 	   return $data;
// 	}

// 	$op = validate($_POST['op']);
// 	$np = validate($_POST['np']);
// 	$c_np = validate($_POST['c_np']);
    
//     if(empty($op)){
//       header("Location: parametre.php?error=Password-is-required");
// 	  exit();
//     }else if(empty($np)){
//       header("Location: parametre.php?error=New-Password-is-required");
// 	  exit();
//     }else if($np !== $c_np){
//       header("Location: parametre.php?error=The-confirmation-password-does-not-match");
// 	  exit();
//     }else {
//       $query = "SELECT password FROM admin WHERE username = 'boualam' ";
//       $stmt = $conn->prepare($query);
//       $stmt->execute();
//       $result = $stmt->fetch();

//       if (password_verify($op, $result['password'])) {
//         $hashedPassword = password_hash($np, PASSWORD_DEFAULT);
//         $updateQuery = "UPDATE admin SET password = '$hashedPassword' WHERE username = 'boualam'";
//         $conn->execute($updateQuery);

//           header("Location: parametre.php?bien=Your-password-has-been-changed-successfully");
//           exit();
//       } else {
//           header("Location: parametre.php?error=Incorrect-password");
//           exit();
//       }

//     }

    
// }else{
// 	header("Location: parametre.php");
// 	exit();
// }

$server = "localhost";
$user = "root";
$password = "";
$db = "test_login";
$conn = mysqli_connect($server,$user,$password,$db);
if($conn){
echo 'Connection Successfully';

}else{
    echo 'Not Connected';
}

$id = $_GET['id_news'];
$update = "SELECT * FROM news WHERE id_news = $id";
$updatequery = mysqli_query($conn, $update);
$result = mysqli_fetch_assoc($updatequery);


if(isset($_POST['submit'])){
    $id = $_GET['id_news'];
    $name = mysqli_real_escape_string($conn, $_POST['titre']);
    $email = mysqli_real_escape_string($conn, $_POST['resume']);
    $adress = mysqli_real_escape_string($conn, $_POST['contenu']);

      $insertquery =  "UPDATE news SET titre ='$name', resume ='$email', contenu ='$adress' WHERE id_news = $id";
        $mysqliquery = mysqli_query($conn, $insertquery);
    if($insertquery){
        ?>
    <script>
        window.location.replace("index.php");
    </script>

<?php 

    }else{
        echo 'Not Updated';
    }



}


?>