<?php
$pdo = require '../Modele/connect.php';
// execute a query
$sql = 'SELECT * FROM navbarre';
$statement = $pdo->query($sql);
$user_data = $statement->fetchAll(PDO::FETCH_ASSOC);



    foreach ($user_data as $up) {

        if(empty($_POST[$up['nom_id']]))
{
    $show=0;
}
else{
    $show = $_POST[$up['nom_id']];
}
        
$sql = "UPDATE navbarre SET `show_nav`=:show WHERE id=".$up['id'];

// Préparation
$updateQuery = $pdo->prepare($sql);

// Exécution
$updateQuery->execute([
    ':show' => $show
]);


} 

   


 header('location:../Admin/index.php');
 
?>