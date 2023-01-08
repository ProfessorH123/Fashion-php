<?php
include '../Components/config.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['register'])){

   $id = create_unique_id();
   $name = $_POST['R_username'];
   $name = filter_var($name, FILTER_SANITIZE_STRING); 

   $email = $_POST['R_email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);

   $pass = $_POST['R_password'];
   $pass = filter_var($pass, FILTER_SANITIZE_STRING); 

   $c_pass = $_POST['R_C_password'];
   $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);   

   //$image = addcslashes(file_get_contents($_FILES['image']['tmp_name']));
   //$image = $_FILES['image']['name'];
   //$image_tmp_name = $_FILES['image']['tmp_name'];
   //$image_size = $_FILES['image']['size'];
   //$image_folder = 'uploaded_img/'.$image;

   $image = $_POST['image'];

   $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_users->execute([$email]);

   if($select_users->rowCount() > 0){
      $warning_msg[] = 'email already taken!';
   }else{
      if($pass != $c_pass){
         $warning_msg[] = 'Password not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(id, Name, Email, Password,Image) VALUES(?,?,?,?,?)");
         $insert_user->execute([$id, $name, $email, $c_pass, $image]);
                  
         if($insert_user){
            $verify_users = $conn->prepare("SELECT * FROM `users` WHERE Email = ? AND Password = ? LIMIT 1");
            $verify_users->execute([$email, $pass]);
            $row = $verify_users->fetch(PDO::FETCH_ASSOC);
            //move_uploaded_file($image_tmp_name, $image_folder);
            if($verify_users->rowCount() > 0){
               setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
               header('location:../index.php');
            }else{
               $error_msg[] = 'something went wrong!';
            }
         }
      }
   }
}
include '../Components/messages.php';

?>