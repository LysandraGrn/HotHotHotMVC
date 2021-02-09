<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

session_start();

if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if (isset($_POST['newpseudo']) and !empty($_POST['newpseudo']) and $_POST['newpseudo'] != $user['pseudo']) {
        $newpseudo = htmlspecialchars($_POST['newpseudo']);
        $insertpseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
        $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
        header('Location: profil.php?id=' . $_SESSION['id']);
    }
    if (isset($_POST['newmail']) and !empty($_POST['newmail']) and $_POST['newmail'] != $user['mail']) {
        $newmail = htmlspecialchars($_POST['newmail']);
        $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
        $insertmail->execute(array($newmail, $_SESSION['id']));
        header('Location: profil.php?id=' . $_SESSION['id']);
    }
    if (isset($_POST['newmdp1']) and !empty($_POST['newmdp1']) and isset($_POST['newmdp2']) and !empty($_POST['newmdp2'])) {
        $mdp1 = sha1($_POST['newmdp1']);
        $mdp2 = sha1($_POST['newmdp2']);
        if ($mdp1 == $mdp2) {
            $insertmdp = $bdd->prepare("UPDATE membres SET mdp = ? WHERE id = ?");
            $insertmdp->execute(array($mdp1, $_SESSION['id']));
            header('Location: profil.php?id=' . $_SESSION['id']);
        } else {
            $msg = "Vos deux mdp ne correspondent pas !";
        }
    }
}
?>