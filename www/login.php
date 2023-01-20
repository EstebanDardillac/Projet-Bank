
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
			<link rel="stylesheet" href="/www/assets/login.css">
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
             <?php 

				require_once __DIR__ . '/../src/templates/partials/html_head.php';
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
            
            <form action="login_traitement.php" method="post">
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
            
        </style>
		</div>

		<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
		</body>
        </body>
</html>