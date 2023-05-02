<!DOCTYPE html>
<html lang="fr">

<?php
 
 require('Modele/connect.php');
   if (!isset($_SESSION['isUserLoggedIn'])){
  echo "<script> window.location.href='./Admin/login.php' </script>";
  }
 
  $pdo= require './Modele/connect.php';
  $sql='SELECT * FROM  navbarre';
  $statement = $pdo ->query($sql);
  $data_nav=$statement->fetchAll(PDO::FETCH_ASSOC);
   //print_r($data);
   //exit; 
  ?>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Mon portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Itim&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>
    <header>
      <nav>
        <ul>
          <?php
          foreach ($data_nav as $item){
            if($item['show_nav']==1){
              echo  '<li class="case"><a href='. $item['link_nav'].">".$item['text_nav']." </a></li>";
            }
          }
          ?>
        </ul>
      </nav>
    </header>
    <!-- barre de navigation -->
    <main>
      <section class="boiteaccueil" id="accueil">
        <div class="texte1">
        <?php
        $pdo= require './Modele/connect.php';
  $sql='SELECT * FROM accueil';
  $statement = $pdo ->query($sql);
  $data_acc=$statement->fetch(PDO::FETCH_ASSOC);
   //print_r($data_acc);
   //exit; 
  
  if($data_nav[0]['show_nav']==1){
  ?>
         <h1><?=$data_acc['titre']?> </h1>
          <h2 class="sous-titre">
          <?=$data_acc['sous_titre']?>
          </h2>
          <p>
          <?=$data_acc['paragraphe']?>
          </p>
          <p class="mono"><img src="<?='Img/'.$data_acc['monogramme']?>" width="300" alt="" /></p>
        </div>

        <div class="fotomoi">
          <img
            class="imagemoi"
            src="<?='Img/'.$data_acc['photo']?>"
            width="400"
            height="250"
          />
        </div>
      </section> <?php }?>

      <section class="comp" id="competences">
     <?php
      $pdo= require './Modele/connect.php';
       $sql='SELECT * FROM  competences';
       $statement = $pdo ->query($sql);
       $data_comp=$statement->fetch(PDO::FETCH_ASSOC);
       //print_r($data_comp);
   //exit;
    ?>
        <h3 class="titre"> <?=$data_comp['titre_comp']?></h3>

        <div class="stylcomp">
          <div classe="imgcomp">
            <img src="<?='Img/'.$data_comp['img_comp']?>" width="400" alt="" />
          </div>

          <div>
            <p class="cv"> <?=$data_comp['texte_comp']?>
            </p>
          </div>
        </div>
      </section>
<?php
 if($data_nav[2]['show_nav']==1){

?>
      <section class="folio" id="projets">
      <?php
        $pdo= require './Modele/connect.php';
  $sql='SELECT * FROM projets';
  $statement = $pdo ->query($sql);
  $data_proj=$statement->fetch(PDO::FETCH_ASSOC);
   //print_r($data_proj);
   //exit; 
  ?>
        <h3 class="titre"><?=$data_proj['titre_projet']?></h3>
    
      
    <div class="styleprojet">
         <div> <h4 class="stprojet"> <?=$data_proj['titre_dw']?></h4> </div>
       <div><p class="textdevweb"><?=$data_proj['text_dw']?></p></div>
       
    
             <a class="lienportfolio" href="<?=$data_proj['lienwp']?>"> Accèdez à la carte de restaurant </a>
             <a class="lienportfolio" href="<?=$data_proj['lienbp']?>"> Accèdez au blog sur les jeux vidéo </a>
 <div>
 </section>
 <section> 
             <div class="section_ergo">
               <div> <h4 class="stprojet"><?=$data_proj['titre_ergo']?></h4></div>

             <div> <p class="textprojet"><?=$data_proj['text_ergo']?></p> </div>
 </div>
             <br>
             <br>
                      <div class="photo_ergo"> 

                         <img src="Img/<?=$data_proj['int_pc']?>" alt="Interface UX ordinateur" width=600px> 
                         <img src="Img/<?=$data_proj['int_tel']?>" alt="Interface UX telephone" width=200px> 
                        
                      </div>
 </section>
 
  <section>
            <div class="section_pp">
              <h4 class="stprojet"><?=$data_proj['titre_pp']?></h4>
              <p class="textprojet"><?=$data_proj['text_pp']?></p></div>
          <br>
          <br>
              <div class="photo_pp">
                <img src="Img/<?=$data_proj['photo1']?>" alt="photo_1" width=400px>
                <img src="Img/<?=$data_proj['photo2']?>" alt="photo_2" width=400px>
              </div>
        
      </section>
 <?php
 }
 ?>
      <section class="contact" id="contact">
        <h3 class="titre">Contactez-moi</h3>
        <div class="wrapper2">
          <div>
            <p class="textcontact">
              Je reste à votre disposition pour toutes autres informations ou
              demande. N’hésitez pas à me contacter vie le formulaire ou par mes
              réseaux sociaux.
            </p>
          </div>

          <div class="form">
            <form method="post">
              <div>
                <label for="name">Nom :</label>
                <input class="animform" type="text" id="nom" name="user_nom" />
              </div>
              <div>
                <label for="name">Prénom :</label>
                <input
                  class="animform"
                  type="text"
                  id="prenom"
                  name="user_prenom"
                />
              </div>
              <div>
                <label for="mail">e-mail:</label>
                <input
                  class="animform"
                  type="email"
                  id="mail"
                  name="user_mail"
                />
              </div>
              <div>
                <label for="msg">Message :</label>
                <textarea
                  class="animform"
                  id="msg"
                  name="user_message"
                ></textarea>
              </div>
              <button
                class="buton"
                type="submit">
                Envoyer le formulaire
              </button>
              <?php
              if(isset($_POST['nom'])){
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $nom= $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $message = $_POST['message'];
                $insertmess=$pdo->prepare("INSERT INTO mess (prenom, nom, email, messag) VALUE (?, ?, ?, ?)");
                $insertmess->execute([$nom, $prenom, $email, $message]);
              }
              ?>
            </form>
          </div>
        </div>
      </section>
    </main>
     
    <footer class="foot">
    <?php
        $pdo= require './Modele/connect.php';
  $sql='SELECT * FROM footer';
  $statement = $pdo ->query($sql);
  $data_foot=$statement->fetch(PDO::FETCH_ASSOC);
   //print_r($data_foot);
   //exit; 
  ?>
      <a href="https://twitter.com/YellowVLR"
        ><img
          src="Img/<?=$data_foot['logotwitwi']?>"
          width="60%"
          title="comptetwitter"
          alt="lien au compte twitter"
      /></a>
      <a href="https://www.instagram.com/paulynehnl/"
        ><img
          src="Img/<?=$data_foot['logoinsta']?>"
          width="25%"
          title="compteinstagram"
          alt="lien au compte instagram"
      /></a>
      <a href="https://discord.gg/Djcr6VZaRn"
        ><img
          src="Img/<?=$data_foot['logodidi']?>"
          width="50%"
          title="serveurdiscord"
          alt="lien au serveur discord"
      /></a>
      <a href="https://www.linkedin.com/in/paulyne-hanouille-32a48a208/"
        ><img
          src="Img/<?=$data_foot['logolinkedin']?>"
          width="13%"
          title="comptelikedin"
          alt="lien au compte linkedin"
      /></a>
    </footer>
  </body>
</html>
