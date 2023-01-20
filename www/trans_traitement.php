<?php 
    require_once __DIR__ .'../../src/init.php';
    require_once __DIR__ . '../../src/db.php'; // On inclu la connexion à la bdd
    
    echo 'testoooo</br>';

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['id_expediteur']) && !empty($_POST['id_destinataire']) && !empty($_POST['montant']) && !empty($_POST['nom_trans']) && !empty($_POST['monnaie']) && !empty($_POST['objet_trans'])){
        // Patch XSS
        $id_expediteur = htmlspecialchars($_POST['id_expediteur']);
        $id_destinataire = htmlspecialchars($_POST['id_destinataire']);
        $nom_trans = htmlspecialchars($_POST['nom_trans']);
        $montant = htmlspecialchars($_POST['montant']);
        $monnaie = htmlspecialchars($_POST['monnaie']);
        $objet_transaction = htmlspecialchars($_POST['objet_transaction']);
        // On vérifie si l'users existe
        $check = $db->prepare('SELECT id_expediteur, id_destinataire, objet_trans FROM users WHERE nom_trans = ?'); 
        $check->execute(array($nom_trans));
        $row = $check->rowCount();

        $objet_trans = strtolower($objet_trans); 
        echo 'Entrée de Boucle! 1</br>';
        // Si la requete renvoie un 0 alors la transaction n'existe pas 
        if($row == 0){ 
            echo 'Entrée de Boucle! 2</br>';
            if(strlen($id_expediteur) <= 100 AND strlen($id_destinataire) <= 100){ // On verifie que la longueur du nom$nom <= 100
                echo 'Entrée de Boucle! 3</br>';
                if(strlen($montant) <= 100){ // On verifie que la longueur du mail <= 100

                            // On insère dans la base de données      (ATTENTION PROBLÈME DÉTECTÉ: "'role' doesn't have a default value" NI DANS LA TABLE USERS NI DANS LA TABLE GRADE)
                            $insert = $db->prepare('INSERT INTO transactions(id_expediteur, id_destinataire, montant, nom_monnaie, objet_trans) VALUES( :id_expediteur, :id_destinataire, :montant, :nom_monnaie, :objet_tans)');
                            echo 'Entrée de execute(array()) LLLLOOOOOOLLLLL</br>';
                            $insert->execute(array(                     //
                                'id_expediteur' => $id_expediteur,                      //
                                'id_destinataire' => $id_destinataire,                //ENDROIT DU PROBLÈME
                                'nom_trans' => $nom_trans,
                                'montant' => $montant,                          //
                                'nom_monnaie' => $monnaie,                   //
                                'objet_trans' => $objet_trans,

                            ));
                            echo 'Sortie de execute(array() :)</br>';
                            // On redirige avec le message de succès
                            header('Location: pilote_compte.php?reg_err=success');
                            die();
                }else{ header('Location: index.php?reg_err=montant_length'); die();echo'Sortie de Boucle! 4</br>';}
            }else{ header('Location: index.php?reg_err=id_length'); die();echo'Sortie de Boucle! 3</br>';}
        }else{ header('Location: index.php?reg_err=already'); die();echo'Sortie de Boucle! 2</br>';}
    }else{
        echo'Sortie de Boucle! 1</br>';
    }