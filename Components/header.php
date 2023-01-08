<?php

//include 'config.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   //header('location:index.php');
}

$select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$select_profile->execute([$user_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

$select_cart = $conn->prepare("SELECT * FROM `cart`");
$select_cart->execute();
$fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC);
if($user_id != ''){
$number_of_items=$conn->prepare("SELECT * FROM `cart` WHERE User_id = ? ");
$number_of_items->execute([$fetch_profile['id']]);
}
?>
<header>
        <div class="container">
            <a href="index.html"><div class="logo">logo</div></a>
            <form action="search.php" method="post" class="search_form">
                <input type="text" placeholder="Search..." id="live_search">
            </form>
            <div class="icons">
                <span id="bars" class="fas fa-bars"></span>
                <?php if($user_id == ''){ ?>
                <span id="account-btn" class="fas fa-user"></span>
                <?php }?>
                <?php if($user_id != ''){ ?>

                <?php  echo "<a href=ShoppingCart/cart.php?User_id={$fetch_profile['id']}><span class='fas fa-shopping-cart'>".$number_of_items->rowcount()."</span></a>";?>
                <?php }?>

                <span id="theme" class="fas fa-moon"></span>
            </div>
        </div>
    </header>

    <div class="account-form">

        <div id="close-form" class="fas fa-times"></div>
     
        <div class="buttons">
           <span class="active login-btn">login</span>
           <span class="register-btn">register</span>
        </div>
     
        <form class="login-form active" method="post" action="LogSign/Login.php">
           <h3>login now</h3>
           <input type="email" name="L_email" required placeholder="your email" class="box">
           <input type="password" name="L_password" required placeholder="your password" class="box">

           <input type="submit" value="login now" name="login" class="btn">
        </form>
     
        <form class="register-form" method="post" action="LogSign/Sign.php">
           <h3>register now</h3>
           <input type="text" name="R_username" required placeholder="your username" class="box">
           <input type="email" name="R_email" required placeholder="your email" class="box">
           <input type="password" name="R_password" required placeholder="your password" class="box">
           <input type="password" name="R_C_password" required placeholder="confirm your password" class="box">

            <button type = "button" class = "box btn-Photo">
            <input type="file" name="image" accept="image/*">
              <i class = "fa fa-upload"></i> Upload Photo
            </button>
          <input type="submit" name="register" value="register now" class="btn">
        </form>
     
    </div>

     <nav class="navbar">
        <?php if($user_id != ''){ ?>
        <div class="userdetails">
        <?php if($fetch_profile['Image'] == ''){?>
            <img src="images/th.jpg" alt="your image">
         <?php }else{?>
            <img src="images/<?php echo $fetch_profile['Image']; ?>" alt="My image">
        <?php } ?>
            <span class="username"><?= $fetch_profile['Name']; ?></span><br>
            <div class="userbtn">
                <?php  echo "<a href=LogSign/UpdateP.php?id={$fetch_profile['id']}><button>update prophile</button></a>";?>
                <a href="LogSign/Logout.php" onclick="return confirm('logout from the website?');"><button>logout</button></a>
            </div>
        </div>
        <?php }?>
        <ul class="list">
            <a href="#about"><li>About Us</li></a>
            <a href="#products"><li>Our Products</li></a>
            <a href="#contact"><li>contact us</li></a>
            <a href="#blog"><li>blog</li></a>
            <?php if($user_id != ''){ ?>
            <a href="ShoppingCart/orders.php?iidd=<?= $fetch_profile['id']; ?>"><li>My Orders</li></a>
            <?php } ?>
        </ul>
        <span id="close" class="fas fa-times"></span>
    </nav>

    