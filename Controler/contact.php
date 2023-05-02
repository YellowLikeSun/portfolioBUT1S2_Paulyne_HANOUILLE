<?php
 require('../Modele/connect.php');
  

              if(isset($_POST['nom'])){
                
                $nom= $_POST['user_nom'];
                $prenom = $_POST['user_prenom'];
                $email = $_POST['user_email'];
                $message = $_POST['user_message'];
                $insertmess=$pdo->prepare("INSERT INTO mess(nom, prenom, email, messag) VALUE (?, ?, ?, ?)");
                $insertmess->execute([$nom, $prenom, $email, $message]);
              }

              echo $nom.'<br><br>';
              echo $prenom.'<br><br>';
              echo $email.'<br><br>';
              echo $message.'<br><br>';

              if(!$insertmess){
                echo "Erreur d'envoi";
              }
              
              ?>