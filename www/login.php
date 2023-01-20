<?php 
                require_once __DIR__ . '../../src/init.php';
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if(isset($_POST['email'], $_POST['mdp'])){
                        
                        $email = $_POST['email'];
                        $mdp = hash('sha256', $_POST['mdp']);
                         
                        if($email != '' && $mdp != ''){
                            $sth = $db->prepare('SELECT * FROM users WHERE email = ? AND mdp = ?');
                            $sth->execute([$email, $mdp]);
                            $donnees = $sth->fetchAll();
                        }
                        
                        if(count($donnees) > 0){
                            
                            $_SESSION['connected'] = true;
                            $_SESSION['id'] = $donnees[0]['id_user'];
                            header('Location: ./compte.php');
                        }
                    }
                }
                ?> 
                
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
			<link rel="stylesheet" href="/www/assets/login.css">
            <link rel="icon" type="image/x-icon" href="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/1024/Bitcoin-BTC-icon.png">
            <title>Connexion</title>
        </head>
        <body>
            <header>
                <a href="index.php" class="correctlink"><h1 id="title">Responsive-Bank</h1></a>
                <nav>
                    <div class="divnav">
                        <a href="#" class="correctlink">Compte Banquaire</a>
                        <a href="login.php" class="correctlink , space">Profil Utilisateur</a>
                    </div>
                </nav>
            </header>

        
        <div class="login-form">
        
            
            <form  method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="mdp" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>   
            </form>
            <p class="text-center"><a href="signup.php">Inscription</a></p>
        </div>
        <style>
            .login-form {
                width: 340px;
                margin: 50px auto;
            }
            .login-form form {
                margin-bottom: 15px;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
				margin-top: 50%;
                background-color: #7638B0;
                border-radius: 20px
            }
            .login-form h2 {
                margin: 0 0 15px;
				color : white;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
            }
        </style>
		</div>

		<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
		</body>
        </body>
</html>