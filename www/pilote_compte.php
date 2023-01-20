<!DOCTYPE html>
    <?php
        require_once __DIR__ . '../../src/db.php';
        session_start();



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
                        header('Location: theme1-facile.php');
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
        
   ?>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

			<link rel="stylesheet" href="/www/assets/pilote.css">
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

            <section class = "transactions">
                <h1>Transactions</h1>
                <div class = "exp">
                    <span>Expediteur : </span>
                    <input type="expéditeur" name="expéditeur" class="form-control" placeholder="Expéditeur" required="required" autocomplete="off">
                </div>
                <div class = "dest">
                    <span>Destinataire : </span>
                    <input type="destinataire" name="destinataire" class="form-control" placeholder="Destinataire" required="required" autocomplete="off">
                </div>
            </section>

            <section class = "retrait">
                <div class= "retireur">
                    <span> Retireur : </span>
                    <input type="retireur" name="retireur" class="form-control" placeholder="Retireur" required="required" autocomplete="off">
                </div>
            </section>

            <section class = "virement">

            </section>
        </body>