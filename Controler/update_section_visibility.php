<?php
$pdo = require('../Modele/connect.php');
if(isset($_POST['update-section'])){
 $accueil=$_POST['Accueil'] ?? 0;
 $comp=$_POST['Compétences'] ?? 0;
 $projets=$_POST['Projets'] ?? 0;
 $contact=$_POST['Contact'] ?? 0;
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