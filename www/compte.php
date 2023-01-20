
    <?php

        if ($role == "banni" || $role == "invité" ){
            die("Vous n'avez pas accés à cette page ");
        }
        require_once __DIR__ . '../../src/init.php';
        require_once __DIR__ . '../../src/db.php';


            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                if (isset($_POST['submit'])) {
                    $emailpost = $_POST['email'];
                    $mdppost = $_POST['mdp'];

                    $sql = "SELECT * FROM utilisateur WHERE email = :mail AND mot_de_passe = :mdp";
                    $request = $bdd->prepare($sql);
                    $request->bindParam(':mail', $emailpost);
                    $request->bindParam(':mdp', $mdppost);
                    $request->execute();
                    $result= $request->fetch();
                    
                    if ($request->rowCount() < 1) {
                        echo "<p style='color:red;'>Email ou mot de passe incorrect</p>";
                    }else{
                        $_SESSION['email'] = $result['email'];
                        $_SESSION['mdp'] = $result['mot_de_passe'];
                        $_SESSION['id'] = $result['identifiant'];
                        $_SESSION['loggedin'] = true;
                        header('Location: compte.php');
                    }              
                }
                     
            }
            
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                $isconnect = $nom;
                $isconnect2 = $prenom;
                $isconnect3 = $mail;
                $isconnect4 = $role;
                $isconnect5 = $client_number;
            }

            $isConnected = isset($_SESSION['connected']) && $_SESSION['connected'] == true;
            if (!$isConnected) {
                header("Location: /www/login.php");
            }
        
   ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

			<link rel="stylesheet" href="/www/assets/compte.css">
            <title>Connexion</title>
        </head>
        <body>
            <header>
            <section class= "header">
            <nav class="box1">
                <h1>Responsive-Bank</h1>
                <div class="box2">
                    <a href="#" class="correctlink">Compte Banquaire</a>
                    <a href="login.php" class="correctlink , space">Profil Utilisateur</a>
                    <a href="<?php echo $isconnect4?>" class="correctlink">SE DECONNECTER</a>
                </div>
            </nav>
            </section>
            </header>
            <section class = "infos">
                <div class="nom"> Nom : <?php echo $isconnect ?></div>
                </br>
                <div class = "prenom">Prénom : <?php echo $isconnect2 ?></div>
                </br>
                <div class = "mail">Email : <?php echo $isconnect3 ?></div>
                </br>
                <div class = "role">Grade : <?php echo $isconnect4 ?></div>
                </br>
                <div class = "client">Numéro de client : <?php echo $isconnect5 ?></div>
                <?php var_dump($_SESSION); ?>
            </section>

            <section class = "actions">
                <a href="pilote_compte.php" style="text-decoration: none"><button type="button"> Piloter mon compte</button></a>
            </section>
        </body>