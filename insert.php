<?PHP
$tmpName = $_FILES['Image']['tmp_name'];
$name = 'Images/'.$_FILES['Image']['name'];
$tabExtension = explode('.', $name);
$extension = strtolower(end($tabExtension));
$extensions = ['jpg', 'png', 'jpeg', 'gif'];
$idsupp = $_POST['IDsupprime'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // définir le mode exception d'erreur PDO 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "INSERT INTO `projets` ( `Titre`, `Definition`, `langage`, `Image`, `URL`)
VALUES( '$_POST[Titre]','$_POST[Definition]','$_POST[langage]', '$name', '$_POST[URL]')
";

// utiliser la fonction exec() car aucun résultat n'est renvoyé
    if(isset($_POST['submit'])){
        $conn->exec($sql);
        echo "Nouveaux enregistrement ajoutés avec sucéés<br> <a href='formulaire.php'>Retour au formulaire</a>";

    }
} 
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

if(isset($_POST['submitdelete'])){
    $requete = "SELECT Id_projet FROM projets";
    $statement = $conn -> prepare($requete);
    $statement -> execute();
    $infos = $statement ->fetchAll();
    foreach($infos as $info){if($info["Id_projet"]== $idsupp){
        $sqldelete ="DELETE from projets WHERE Id_projet = '$idsupp'";
        $result = $conn->query($sqldelete);
        echo'élément bien supprimé';
    }}
}


if(isset($_POST['submit'])){
    if (isset($_FILES['Image'])&& $_FILES['Image']['error']== 0){
        if(in_array($extension, $extensions)){
            move_uploaded_file($tmpName, $_SERVER['DOCUMENT_ROOT'].'/'.$name);
        }
    }
    
}
$conn = null;

?>