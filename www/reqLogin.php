<?php 
                // require_once __DIR__ . '../../src/init.php';

                session_start();

                $dsn = 'mysql:host=localhost;dbname=projectbank;port=8888;charset=utf8';

                $pdo = new PDO($dsn,'root','root');

                echo'test';

                
                
                if(isset($_POST['connexion'])){
                    $emailAdmin="admin@admin.com";
                    $mdpAdmin="ac9689e2272427085e35b9d3e3e8bed88cb3434828b43b86fc0596cad4c6e270";
                
                    if(!empty($_POST['email']) && !empty($_POST['mdp'])){
                        $email = $_POST["email"];
                        $mdp = hash('sha256', $_POST["mdp"]);
                        
                        if ($emailAdmin === $email && $mdpAdmin === $mdp){
                            $_SESSION['mdp'] = $mdp;
                        header ('Location: administration.php');
                        die();
                        }
                    
                        $reccupUser = $pdo->prepare('SELECT * FROM users WHERE email= ? and mdp= ?');
                        $reccupUser->execute(array($email, $mdp));
                        $checkRecup = $reccupUser->fetch();

                         echo $reccupUser;
                        header('location: ./compte.php');
                        // if($reccupUser->rowCount() > 0){
                        //     $_SESSION['email'] =$email;
                        //     $_SESSION['mdp'] = $mdp;
                        //     $_SESSION['id_user'] = $reccupUser->fetch()['id_user'];
                        //     header("location: compte.php");
                        //     die();
                        // } else{
                        //     echo "votre email ou mot de passe est incorrect";
                        // }
                
                    }else{
                        echo "veuillez completer les champs";
                    }
                }
                ?> 