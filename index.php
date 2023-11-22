<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      
      // Create connection
      $conn = new mysqli($servername, $username, $password);
      
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      echo "Connected successfully";
      // Create database
$sql = "CREATE DATABASE if not exists DB_CIH";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$dbname = "DB_CIH";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql= "CREATE TABLE if not exists  MyUser(
    id int  AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    confirmPassword VARCHAR(255) NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Table MyGuests created successfully";
      } else {
        echo "Error creating table: " . $conn->error;
      }
    
    if ($_SERVER["REQUEST_METHOD"] == "post") {
    $nom = $_POST["nom"];
    $password = password_hash($_POST['PW'], PASSWORD_DEFAULT); 
    $confirm = password_hash($_POST['confirmPassword'], PASSWORD_DEFAULT); 


    // Requête pour insérer les données dans la table (à adapter selon votre table)
    $stmt = $conn->prepare("INSERT INTO MyUser (id, nom, password,confirmPassword) VALUES ('', $nom, $password,$confirm )");
    $stmt->bind_param('', $nom, $password, $confirm);

    if ($connexion->query($requete) === TRUE) {
        echo "Les données ont été ajoutées avec succès.";
    } else {
        echo "Erreur : " . $requete . "<br>" . $connexion->error;
    }
}

?>
    <div class="items-center justify-center	 bg-gray-200 p-6 rounded-lg shadow-lg w-fit  ">
        <form action="traitement.php" method="post">
            <label for="nom">Nom :</label><br>
            <input type="text" id="nom" name="nom"><br><br>
            
            <label for="password">Password :</label><br>
            <input type="password" id="password" name="password>"<br><br><br>

            <label for="confirm password">Confirm password :</label><br>
            <input type="password" id="password" name="password>"<br><br><br>
            
            <input type="submit" value="Ajouter">
        </form>

    </div>





</body>
</html>