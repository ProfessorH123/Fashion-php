<?php
include '../Components/config.php';

if(isset($_POST['login'])){

    $email = $_POST['L_email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING); 
    $pass = $_POST['L_password'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING); 
 
    $select_users = $conn->prepare("SELECT * FROM `users` WHERE Email = ? AND Password = ? LIMIT 1");
    $select_users->execute([$email, $pass]);
    $row = $select_users->fetch(PDO::FETCH_ASSOC);
 
    if($select_users->rowCount() > 0){
      if($row['User_Type'] == 'admin')
      {
         setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
         $_SESSION['user_is'] = $row['id'];
         header('location:../admin.php');
      }
      elseif($row['User_Type'] == 'user')
      {
         setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
         $_SESSION['user_is'] = $row['id'];
         header('location:../index.php');
      }
    }else{
       $warning_msg[] = 'Incorrect username or password!';
    }
 
}
include '../Components/messages.php';

?>