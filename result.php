<a href="main.php">Accueil</a><br>
<?php
if(!empty($_POST['farhen'])) {
    $val = $_POST['farhen'];
    $cels = ($val-32)*(5/9);
    echo "<br>La valeur en degré est $cels.";
}
else{
    echo "<br> Veuillez saisir une valeur.";
}
echo "<br>";
?>