<?php 
                require_once __DIR__ . '../../src/init.php';
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
                require_once __DIR__ . '/../src/templates/partials/html_head.php'; ?>
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