<?php
$pdo = require('../Modele/connect.php');
if(isset($_POST['update-section'])){
 $accueil=$_POST['Accueil'];
 $comp=$_POST['Compétences'];
 $projets=$_POST['Projets'];
 $contact=$_POST['Contact'];
 $sql = "UPDATE section_control SET ";
 $sql .= "Accueil_section=$accueil,";
 $sql .= "Compétences_section=$comp,";
 $sql .= "Projets_section=$projets,";
 $sql .= "Contact_section=$contact,WHERE id=1";
 $statement = $pdo->query($sql);
 if($statement) {
 echo "<script> window.location.href='../admin/index.php';
</script>";
 }
}
?>