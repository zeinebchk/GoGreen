<?php
session_start();
include_once "../entities/user.php";

if (isset($_POST['submit'])) {
 if (isset($_POST['email']) &&  isset($_POST['password'])){
  if (!empty($_POST['email']) && !empty($_POST['password'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $user=new user();
    $pdo=new PDO("mysql:host=localhost;dbname=gogreen","root","");
    $users=$user->findBy($pdo, $email, $password);

    // Générez du code JavaScript pour afficher dans la console
    if (!empty($users)) {
        $firstUser = reset($users); // Obtient le premier utilisateur s'il y en a plusieurs
        $cin = $firstUser['cin'];
    
        // Stocker le cin dans une variable de session
        $_SESSION['cin'] = $cin;
        header("location:../views/tableau.html");
    } else {
        echo "Aucun utilisateur trouvé";
    }
    // if ($users != null) {

    //     $_SESSION['cin']=$users['cin'];
    //     $_SESSION['email'] = $users['email'];
    //     $_SESSION['password'] = $users['password']; 
      
        // 
//         exit(); 
//     } else {
//         echo "<script>alert('Veuillez vérifier vos données')</script>";
//         header("location:../views/login.html");
//         exit();
//     }
 }
 }
}
    ?>