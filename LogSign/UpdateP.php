<?php
    include '../Components/config.php';

    $x=$_GET["id"];
    $select_profile=$conn->query("SELECT * FROM `users` WHERE id = '$x'");
    $row=$select_profile->fetch(PDO::FETCH_ASSOC);
        $name=$row['Name'];
        $email=$row['Email'];
        $pass=$row['Password'];
        $image=$row['Image'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="up.css">
        <!--==Using-Font-Awesome======================-->
        <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>
<body>
<section class="update-profile-container">

<form action="Updated.php" method="get" enctype="multipart/form-data">
    <p id="demo"></p>
   <div class="flex">
      <div class="inputBox">
         <span>Your ID : </span>
         <input class="box" type="text" name="num" readonly value="<?php echo $x;?>" />
         <span>Your Name : </span>
         <input class="box" type="text" name="name" value="<?php echo $name;?>" />
         <span>Upload Photo : </span>
         <button type = "button" class = "box btn-Photo">
              <i class = "fa fa-upload"></i>
              <input type="file" id="f1" name="image">
        </button>
      </div>
      <div class="inputBox">
         <span>Your Email :</span>
         <input class="box"type="text" name="email" value="<?php echo $email;?>" />
         <span>Your Ancient Password :</span>
         <input class="box" hidden type="text" value="<?php echo $pass;?>" name="last_Pass" />
         <input class="box" type="text" name="lastPass" />
         <span>Your new Password :</span>
         <input class="box" type="text" name="newPass" />
      </div>
   </div>
   <div class="flex-btn">
   <input type="submit" value="Update Profile" class="btn" />
      <a href="../index.php" class="option-btn">go back</a>
   </div>
</form>

</section>
<script>
    function maFonction(){
        var r = new FileReader();
        var f1=document.getElementById('f1').files[0];
        r.readAsDataURL(f1);r.onload=function()
        {document.getElementById("demo").innerHTML ='<img width="100px"  src="'+r.result+'"/>';}
    }
    document.getElementById("f1").addEventListener("change", maFonction);
</script>
</body>
</html>