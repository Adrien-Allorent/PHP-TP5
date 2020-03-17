<h1>TP5</h1>
<a href="main.php">Touche F5</a>
<h2>Exo1</h2>
<a href="main.php?fahr=75">Cliquer pour avoir la valeur en degré</a>

<?php
if($_GET['fahr'] != null){
    $cels = ($_GET['fahr'] -32)*5/9;
    echo "<br>La valeur en degré est $cels.";
}
echo "<br>";
?>
<h3>Deuxième version</h3>
<form action="result.php" method="post">
    Température en Farhenheit : <input type="number" name="farhen" />
    <input type="submit" value="Valider" />
</form>
<h2>Exo2</h2>

<form action="main.php" method="post">
    Nom : <input type="text" name="nom" />
    Prénom : <input type="text" name="prenom" /><br>
    <label>Débutant</label><input type="radio" value="débutant" name="niveau"/>
    <label>Avançé</label><input type="radio" value="avancé" name="niveau"/><br>
    <input type="reset" value="Effacer" />
    <input type="submit" value="Envoyer" />
</form>
<?php
if(!empty($_POST['prenom']) && !empty($_POST['nom']) && isset($_POST['niveau'])){
    echo "Bonjour ".$_POST['prenom']." ".$_POST['nom'].". Vous avez un niveau ".$_POST['niveau'];
}
?>

<h2>Exo3</h2>

<form action="main.php" method="post">
    Nom <input type="text" name="nom" required/>
    Prénom <input type="text" name="prenom" required/>
    Age <input type="number" name="age" required/><br><br>
    Langues pratiquées (choisir au minimum 2)<br>
    <select name="languages[]" multiple="multiple">
        <option name="french">français</option>
        <option name="english">anglais</option>
        <option name="deutsch">allemand</option>
        <option name="spanish">espagnol</option>
    </select>
    <br><br>
    Compétences informatiques (choisir au minimum 2)<br>
    <label>HTML</label><input type="checkbox" value="HTML" name="button1"/>
    <label>CSS</label><input type="checkbox" value="CSS" name="button2"/>
    <label>PHP</label><input type="checkbox" value="PHP" name="button3"/>
    <label>SQL</label><input type="checkbox" value="SQL" name="button4"/>
    <label>C</label><input type="checkbox" value="C" name="button5"/>
    <label>C++</label><input type="checkbox" value="C++" name="button6"/>
    <label>JS</label><input type="checkbox" value="JavaScript" name="button7"/>
    <label>Python</label><input type="checkbox" value="Python" name="button8"/><br><br>
    <input type="reset" value="EFFACER" />
    <input type="submit" value="ENVOI" />
</form>

<?php
    if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['age'])){
        echo "Vous êtes ".$_POST['prenom']." ".$_POST['nom'].".<br>
        Vous avez ".$_POST['age']." ans.<br><br>";
    }
    if(count($_POST['languages'])>=2){
        echo "Vous parlez : ";
        foreach($_POST['languages'] as $lang){
            echo"<li>$lang</li>";
        }
        echo "<br><br>";
    }
    $info = 0;
    for($i = 0; $i < 8; $i++){
        if(isset($_POST['button'.(1+$i)])){ $info++; }
    }
    if($info >= 2){
        echo "Vous avez des compétences informatiques en : ";
        for($i = 0; $i < 8; $i++){
            if(isset($_POST['button'.(1+$i)])){
                echo "<li>". $_POST['button'.(1+$i)] ."</li>";
            }
        }
    }
?>

<h2>Exo4</h2>

<?php
if(empty($_POST['one'] || empty($_POST['two'])) || ($_POST['equation'] == "Division x/y" && $_POST['two'] == 0)){
    $_POST['result'] = "Valeurs incorrectes.";
}
if(isset($_POST['equation']) && !empty($_POST['one']) && !empty($_POST['two'])){
    if($_POST['equation'] == "Addition x+y"){
        $_POST['result'] = $_POST['one'] + $_POST['two'];
    }
    else if($_POST['equation'] == "Soustraction x-y"){
        $_POST['result'] = $_POST['one'] - $_POST['two'];
    }
    else if($_POST['equation'] == "Division x/y" && $_POST['two'] != 0){
        $_POST['result'] = $_POST['one'] / $_POST['two'];
    }
    else if($_POST['equation'] == "Puissance x^y") {
        $_POST['result'] = $_POST['one'] ** $_POST['two'];
    }
}
?>
<form action="main.php" method="post">
    <b>Nombre 1  </b> <input type="number" name="one" /><br>
    <b>Nombre 2  </b> <input type="number" name="two" /><br>
    <b>Résultat  </b> <input type="text" name="result" value="<?php if(isset($_POST['result'])){echo $_POST['result'];}?>" disabled/><br>
    <b>Cliquer sur un bouton! </b>
    <input type="submit" value="Addition x+y" name="equation"/>
    <input type="submit" value="Soustraction x-y" name="equation"/>
    <input type="submit" value="Division x/y" name="equation"/>
    <input type="submit" value="Puissance x^y" name="equation"/>
</form>

<h2>Exo5</h2>

<form action="main.php" method="post" enctype="multipart/form-data">
    <b>Fichier 1</b> <input type="file" name="file1" /><br>
    <b>Fichier 2</b> <input type="file" name="file2" /><br>
    <input type="submit" value="Envoi"/>
</form>
<?php

echo"<table border='5px'><tr><td></td><td>Fichier 1</td><td>Fichier 2</td></tr>";
echo"<tr><td>Name</td><td>".$_FILES['file1']['name']."</td><td>".$_FILES['file2']['name']."</td></tr>";
echo"<tr><td>Type</td><td>".$_FILES['file1']['type']."</td><td>".$_FILES['file2']['type']."</td></tr>";
echo"<tr><td>tmp_name</td><td>".$_FILES['file1']['tmp_name']."</td><td>".$_FILES['file2']['tmp_name']."</td></tr>";
echo"<tr><td>Error</td><td>".$_FILES['file1']['error']."</td><td>".$_FILES['file2']['error']."</td></tr>";
echo"<tr><td>Size</td><td>".$_FILES['file1']['size']."</td><td>".$_FILES['file2']['size']."</td></tr>";

$test1 = move_uploaded_file($_FILES['file1']['tmp_name'],"test1.png");
$test2 = move_uploaded_file($_FILES['file2']['tmp_name'],"test2.png");
if ($test1 and $test2){
    ?>
        <tr><td>Image</td><td><img src='test1.png'/></td><td><img src='test2.png'/></td></tr>\";
    <?php
}
echo "</table>";
?>

<h2>Exo7</h2>

<?php
print_r($_COOKIE);

echo "<br>".$_COOKIE['cookie0'];
echo "<br>".$_COOKIE['cookie1'];
?>
