<?php 
    require_once __DIR__ . '../../src/init.php'
    session_start(); // Démarrage de la session
    require_once __DIR__ . '../../src/config.php'; // On inclu la connexion à la db

    require_once __DIR__ . '../../src/db.php';

    if(!empty($_POST['email']) && !empty($_POST['mdp'])) // Si il existe les champs email, mdp et qu'il sont pas vident
    {
        // Patch XSS
        $email = htmlspecialchars($_POST['email']); 
        $mdp = htmlspecialchars($_POST['mdp']);
        
        $email = strtolower($email); // email transformé en minuscule
        
        // On regarde si l'utilisateur est inscrit dans la table users
        $check = $db->prepare('SELECT nom, prenom, email, mdp, client_number FROM users WHERE email = :email');
        $check->execute(['email' => $email]);
        $data = $check->fetch();
        $row = $check->rowCount();
        
        

        // Si > à 0 alors l'utilisateur existe
        if($row > 0)
        {
            // Si le mail est bon niveau format
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Si le mot de passe est le bon
                if(password_verify($mdp, $data['password']))
                {
                    die();
                }else{ header('Location: compte.php?login_err=password'); die(); }
            }else{ header('Location: login.php?login_err=email'); die(); }
        }else{ header('Location: index.php?login_err=already'); die(); }
    }else{ header('Location: index.php'); die();} // si le formulaire est envoyé sans aucune données