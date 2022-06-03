<?php 
$conn = new PDO("mysql:host=localhost;dbname=portfolio;charset=utf8mb4", "root","");
$requete = "SELECT * FROM projets";
$statement = $conn -> prepare($requete);
$statement -> execute();
$infos = $statement ->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <div class="section">
        <h1 class="titre t1">Mon Portfolio</h1>
        <h2 class="titre t2">Mes projets</h2>
<?php 
echo'<div class="projets">
<i class="fa-solid fa-xmark" style="font-size: 30px;color: red"></i>';
foreach($infos as $info){
    echo'
    <div class=projet>
    <figure class="effect-layla">
    <img class="images" src="'.$info["Image"].'"/>
    <figcaption>
    <h3 class="titrepro">'.$info["Titre"].'</h3>
    <p class="langage">'.$info["langage"].'</p>
  </figcaption>   
  </figure>
    <p class="definition">'.$info["Definition"].'</p>
</div>';
        }
        echo'</div>'
?>
        <h2 class="titre t3">Contacte moi</h2>
        <p>test</p>
    </div>

<script src="script.js"></script>
</body>
</html>