<?php
require('../Modele/connect.php');

$sqlQuery = 'SELECT * FROM navbarre';
$Query = $pdo->prepare($sqlQuery);
$Query->execute();
$user_data = $Query->fetchAll();


    foreach ($user_data as $up) {

        if(empty($_POST[$up['nom_id']]))
{
    $show=0;
}
else{
    $show = $_POST[$up['nom_id']];
}
        
$sql = "UPDATE nav SET `show`=:show WHERE id=".$up['id'];

// Préparation
$updateQuery = $pdo->prepare($sql);

// Exécution
$updateQuery->execute([
    ':show' => $show
]);


} 

   


 echo header('location:../Admin/index.php');
 
?>