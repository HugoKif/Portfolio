<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="insert.php" method="post" enctype="multipart/form-data">

Titre <input type="text" name="Titre" />
Definition <input type="text" name="Definition" />
langage <input type="text" name="langage" />
URL <input type="text" name="URL" />
Image<input type="file" name="Image">
<br>

<input type="submit" name="submit"/>
<br>
Id projet a supprimer <input type="text" name="IDsupprime" />
<input type="submit" name="submitdelete"/>
<br>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

// Créer une conexion
$conn = new mysqli($servername, $username, $password, $dbname);
// verifier la connexion
if ($conn->connect_error) {
  die("La connexion a échouée: " . $conn->connect_error);
}
$sql = "SELECT id_projet, Titre FROM projets";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afficher les résultats de chaque ligne
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id_projet"]. " - Titre: " . $row["Titre"]."<br>";
    }
} else {
    echo "0 results";
}

$conn->close();

?>
</form>
</body>
</html>