<?php 
    require_once __DIR__ .'../../src/init.php';
    require_once __DIR__ . '../../src/db.php'; // On inclu la connexion à la bdd
    
    echo 'testoooo</br>';

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['mdp_retype'])){
        // Patch XSS
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $mdp_retype = htmlspecialchars($_POST['mdp_retype']);
        $client_number = rand();
        // On vérifie si l'users existe
        $check = $db->prepare('SELECT email FROM users WHERE email = ?'); 
        $check->execute(array($email));
        $row = $check->rowCount();

        $email = strtolower($email); 
        echo 'Entrée de Boucle! 1</br>';
        // Si la requete renvoie un 0 alors l'users n'existe pas 
        if($row == 0){ 
            echo 'Entrée de Boucle! 2</br>';
            if(strlen($nom) <= 100 AND strlen($prenom) <= 100){ // On verifie que la longueur du nom$nom <= 100
                echo 'Entrée de Boucle! 3</br>';
                if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                    echo 'Entrée de Boucle! 4</br>';
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                        echo 'Entrée de Boucle! 5</br>';
                        if($mdp === $mdp_retype){ // si les deux mdp saisis sont bon
                            echo 'Entrée de Boucle! 6</br>';

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            //$mdp = password_hash($mdp, PASSWORD_BCRYPT, $cost);

                            // On insère dans la base de données      (ATTENTION PROBLÈME DÉTECTÉ: "'role' doesn't have a default value" NI DANS LA TABLE USERS NI DANS LA TABLE GRADE)
                            $insert = $db->prepare('INSERT INTO users(nom, prenom, email, mdp, role, last_ip, client_number) VALUES( :nom, :prenom, :email, :mdp, :role, :last_ip, :client_number )');
                            echo 'Entrée de execute(array()) LLLLOOOOOOLLLLL</br>';
                            $insert->execute(array(                     //
                                'email' => $email,                      //
                                'mdp' => $mdp,                //ENDROIT DU PROBLÈME
                                'nom' => $nom,                          //
                                'prenom' => $prenom,                   //
                                'client_number' => $client_number,
                                'role' => 1,
                                'last_ip' => $_SERVER["REMOTE_ADDR"],

                            ));
                            echo 'Sortie de execute(array() :)</br>';
                            // On redirige avec le message de succès
                            header('Location:signup.php?reg_err=success');
                            die();
                        }else{ header('Location: signup.php?reg_err=password'); die();echo'Sortie de Boucle! 6</br>';}
                    }else{ header('Location: signup.php?reg_err=email'); die();echo'Sortie de Boucle! 5</br>';}
                }else{ header('Location: signup.php?reg_err=email_length'); die();echo'Sortie de Boucle! 4</br>';}
            }else{ header('Location: signup.php?reg_err=nom_length'); die();echo'Sortie de Boucle! 3</br>';}
        }else{ header('Location: signup.php?reg_err=already'); die();echo'Sortie de Boucle! 2</br>';}
    }else{
        echo'Sortie de Boucle! 1</br>';
    }