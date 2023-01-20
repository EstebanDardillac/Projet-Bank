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
            <section class ="pilote">
                <section class = "transactions">
                <form action="trans_traitement.php" method="post">
                    <h2 class="text-center">Transactions</h2>       
                    <div class="form-group">
                        <input type="text" name="id_expediteur" class="form-control" placeholder="Id de l'expéditeur" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="id_destinataire" class="form-control" placeholder="Id du destinataire" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nom_trans" class="form-control" placeholder="Nom de la transaction" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="montant" class="form-control" placeholder="Montant" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="monnaie" class="form-control" placeholder="Nom de la monnaie" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="objet_transaction" class="form-control" placeholder="L'objet de la transaction" required="required" autocomplete="off">
                    </div>
                    <div class="form-group-btn">
                        <button type="submit" class="btnTrans">Effectuer la transaction</button>
                    </div>   
                </form>
                </section>

                <section class = "retrait">
                <form action="trans_traitement.php" method="post">
                    <h2 class="text-center2">Retrait</h2>       
                    <div class="form-group">
                        <input type="text" name="id_bank" class="form-control" placeholder="Votre id bank" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nom_retrait" class="form-control" placeholder="Nom du retrait" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="montant" class="form-control" placeholder="Montant" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="monnaie" class="form-control" placeholder="Nom de la monnaie" required="required" autocomplete="off">
                    </div>
                    <div class="form-group-btn">
                        <button type="submit" class="btnTrans">Effectuer la transaction</button>
                    </div>   
                </form>
                </section>

                <section class = "virement">
                <form action="trans_traitement.php" method="post">
                    <h2 class="text-center2">Deposit</h2>       
                    <div class="form-group">
                        <input type="text" name="id_bank" class="form-control" placeholder="Votre id bank" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nom_depot" class="form-control" placeholder="Nom du depot" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="montant" class="form-control" placeholder="Montant" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="monnaie" class="form-control" placeholder="Nom de la monnaie" required="required" autocomplete="off">
                    </div>
                    <div class="form-group-btn">
                        <button type="submit" class="btnTrans">Effectuer la le depot</button>
                    </div>   
                </form>
                </section>
            </section>
        </body>