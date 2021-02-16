<?php
?>
<div class="separator">
    <h2>Comment utiliser l'application</h2>

        <h3>Création du compte utilisateur</h3>

            <p>Afin de vous inscrire sur le site HotHotHot, vous devez renseigner les informations suivantes: <br /></p>
            <ul>
                <li>Votre pseudo</li>
                <li>Votre email</li>
                <li>Un mot de passe</li>
            </ul>
            <p>Une fois ce formulaire renseigné, vous pourrez vous connecter à votre compte.</p>

        <h3>Connexion au compte</h3>

            <p>Pour vous connecter, cliquez tout simplement sur le bouton de connexion. </p>

        <h3>Déconnexion du compte</h3>

            <p>Pour vous déconnecter, cliquez tout simplement sur le bouton de déconnexion. </p>

        <h3>Votre page profil</h3>

            <p>Votre page profil comprend tous les éléments que vous avez saisi lors de votre inscription.
            Cette page vous permet également d'éditer votre profil si nécessaire. </p>

</div>
<h2>Framework</h2>
    <h3>Modele View Controller</h3>
        <p>Ce framework PHP s'articule en MVC, ce qui signifie qu'il possède les dossiers suivants:</p>
            <ul>
                <li>Modele: contient les données que l'on souhaite afficher. </li> <br />
                <li>View: contient l'interface graphique. </li> <br />
                <li>Controller: permet de modifier les données du modèle et de la vue et traite les actions effectuées par l'utilisateur. </li> <br />
            </ul> <br />
    <h3>Autres dossiers importants</h3>
        <p>Ce Framework contient également d'autres dossiers permettant de le faire fonctionner: </p>
            <ul>
                <li>Core: c'est le noyau qui permet de charger les différentes pages de ce Framework avec notamment l'Autoload,
                    qui va charger toutes les pages des différents dossiers du MVC.
                </li> <br />
                <li>Buffer: comprend les différentes méthodes qui permettent au système de cache de fonctionner.
                Ce système peut fonctionner à la fois pour des parties textuelles (paragraphes...)en utilisant les méthodes appropriées, que pour des fichiers
                php qu'il faudra inclure à l'aide de la méthode inc().
                </li> <br />
                <li>css/js/json: comprend les fichiers permettant de modifier l'interface, ajouter des fonctions ou traiter des données JSON.</li> <br />
                <li>tmp: contient les fichiers temporaires stockés grâce au système de cache. </li> <br />
            </ul>