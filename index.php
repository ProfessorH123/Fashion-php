<?php
include 'Components/config.php';

if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
 }else{
    $user_id = '';
 }
 include 'Components/add_to_cart.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> 
        <!--==Using-Css-File======================-->
    <link rel="stylesheet" href="styless.css">
    <!--==Using-Font-Awesome======================-->
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <script src="aos.js"></script>
    <title>index</title>
</head>
<body>
    <?php include 'Components/header.php'; ?>

    <section id="home" class="home">
        
        <div class="overlay">
            <div class="home-content">
                <h1 class="title-1">welcome</h1>
                <h2 class="title-2">fashion & fashions</h2>
                <p class="home-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore placeat iusto explicabo.</p>
            </div>
       </div>

    </section>

    <section class="about py" id="about">
        <span class="title">about <font style="color: var(--color);">us</font></span>
        <div class="container">
            <div class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet sunt nam quis sapiente et repellendus repellat nihil maiores.</div>
            <div class="imge"><img src="images/home_img4.jpg" alt=""></div>
        </div>
    </section>

    <section class="products py" id="products">
        <span class="title">our <font style="color: var(--color);">products</font></span>
        <div class="category">
            <ul class="list">
            <?php 
                $select_category = $conn->prepare("SELECT * FROM `category` ");
                $select_category->execute();
                if($select_category->rowCount() > 0){
                    while($fetch_category = $select_category->fetch(PDO::FETCH_ASSOC)){
            ?>
                <li><button class="item_" type="submit" data-id="<?php echo $fetch_category['CatName']; ?>"><?php echo $fetch_category['CatName']; ?></button></li>
                <?php }} ?>
            </ul>
        </div>
        <div id="cc">
        <div class="container">
        <?php 
      $select_products = $conn->prepare("SELECT * FROM `products` limit 6");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){
            $lastid='';
   ?>
   <form action="" method="post">
            <div class="product">
                <div class="image">
                <img class="im" src="images/<?php echo $fetch_prodcut['ImageP']; ?>" alt="product">
                    <span class="span"><?php echo $fetch_prodcut['PriceP']; ?>$</span>
                    <input type="hidden" name="product_id" value="<?php echo $fetch_prodcut['id']; ?>">
                </div>
                <div class="productname"><?php echo $fetch_prodcut['NameP']; ?></div>
                <input type="submit" class="addbtn" value="add to cart" name="add_to_cart">
            </div>
    </form>
        <?php
        $lastid= $fetch_prodcut['id'];
      }
   }else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>
      </div>
    <div id="remove">
    <button type="button" name="loadmore" data-id="<?php echo $lastid; ?>" id="loadmore" class="load_more">load more</button>
    </div>
        </div>

    </section>

    <script>
        $(document).ready(function () {
            $(".item_").click(function () {
                let dataId = $(this).attr("data-id");
                console.log(dataId);
                //make ajax request
                var actionURL = 'data.php';
                $.ajax({
                    url: actionURL,
                    type: "POST",
                    data: {
                        dataId: dataId
                    },
                    success: function (response) {
                        $("#cc").html(response);
                    }
                })
            })
        })
        AOS.init();
    </script>

    <script>
$(document).ready(function(){  
      $(document).on('click', '#loadmore', function(){  
           var lastid = $(this).data('id');  
           $('#loadmore').html('Loading...');  
           $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{
                    lastid:lastid,
                },  
                dataType:"text",  
                success:function(data)  
                {  
                     if(data != '')  
                     {  
                          $('#remove').remove();  
                          $('#cc').append(data);  
                     }
                }  
           });  
      });  
 }); 
</script> 

<script>
$(document).ready(function(){  
      $("#live_search").keyup(function(){
        var input = $(this).val();
        if(input != "")
        {
            $.ajax({  
                url:"search.php",  
                method:"POST",  
                data:{
                    input:input,
                },  
                dataType:"text",  
                success:function(data)  
                {  
                          $('#cc').html(data);
                          $('#cc').css("display","block");  
                }  
           }); 
        }else{
            $('#cc').css("display","block");
        }
      })  
 }); 
</script> 
    <section class="contact py" id="contact">
        <span class="title">contact <font style="color: var(--color);">us</font></span>
        <div class="container">
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13261.292939488649!2d10.9920973!3d33.8039707!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13aa97d000cc3287%3A0x8f520d45ef2056f2!2sCarrefour%20Market%20Midoun!5e0!3m2!1sfr!2stn!4v1671482136694!5m2!1sfr!2stn"></iframe>
            <div class="cont">
                <div class="box">
                    <div class="buttons">
                        <button class="active info_btn" type="submit">informations</button>
                        <button class="contact_btn" type="submit">contact</button>
                    </div>
                    <div class="info_form">
                        <div class="cont_icons">
                            <i class="active adresse fas fa-map"></i>
                            <i class="fas telephone fa-phone"></i>
                            <i class="fas partners fa-handshake"></i>
                        </div>
                        <div class="popup-1">
                            <ul class="list">
                                <li style="color: var(--black);"><font style="color: var(--color);">Adresse 1:</font> harum quaerat sapiente assumenda?</li>
                                <li style="color: var(--black);"><font style="color: var(--color);">Adresse 2:</font> harum quaerat sapiente assumenda?</li>
                                <li style="color: var(--black);"><font style="color: var(--color);">Adresse 3:</font> harum quaerat sapiente assumenda?</li>
                                <li style="color: var(--black);"><font style="color: var(--color);">Adresse 4:</font> harum quaerat sapiente assumenda?</li>
                            </ul>
                        </div>
                        <div class="none popup-2">
                            <ul class="list">
                                <li style="color: var(--black);"><font style="color: var(--color);">Telephone 1:</font> 22 333 444</li>
                                <li style="color: var(--black);"><font style="color: var(--color);">Telephone 2:</font> 44 555 666</li>
                                <li style="color: var(--black);"><font style="color: var(--color);">Telephone 3:</font> 11 777 888</li>
                                <li style="color: var(--black);"><font style="color: var(--color);">Telephone 4:</font> 99 000 333</li>
                            </ul>
                        </div>
                        <div class="none popup-3">
                            <ul class="list">
                                <li style="color: var(--black);"><font style="color: var(--color);">Partner 1:</font> Lorem, ipsum.</li>
                                <li style="color: var(--black);"><font style="color: var(--color);">Partner 2:</font> dolor sit.</li>
                                <li style="color: var(--black);"><font style="color: var(--color);">Partner 3:</font> amet consectetur.</li>
                                <li style="color: var(--black);"><font style="color: var(--color);">Partner 4:</font> adipisicing elit.</li>
                            </ul>                        </div>
                    </div>

                    <form class="none contact_form" action="Contact/contact.php" method="get">
                        <input type="text" name="cont_user" placeholder="Your Name">
                        <input type="email" name="cont_email" placeholder="Your Email">
                        <input type="number" name="cont_tel" placeholder="Your Phone Number">
                        <textarea name="cont_msg" cols="30" rows="10" placeholder="Your Message"></textarea>
                        <input type="submit" name="cont_submit" value="Send">
                    </form>

                </div>
            </div>
        </div>
    </section>

    <section class="blog py" id="blog">
        <span class="title">Best <font style="color: var(--color);">comments</font></span>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
                $select_contact = $conn->prepare("SELECT * FROM `contact` ");
                $select_contact->execute();
                if($select_contact->rowCount() > 0){
                    while($fetch_contact = $select_contact->fetch(PDO::FETCH_ASSOC)){?>
          <div class="swiper-slide">
            <div class="box">
                <div class="rev_name"><?php echo $fetch_contact['cont_user']; ?></div>
                <div class="rev_message"><?php echo $fetch_contact['cont_TEXT']; ?></div>
            </div>
          </div>
          <?php }} ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
  
    </section>

    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <a href="#">logo</a>
    
    
              <div class="footer-social">
                <a href="#"><i class="fab fa-facebook fa-3x"></i></a>
                <a href="#"><i class="fab fa-twitter fa-3x"></i></a>
                <a href="#"><i class="fab fa-instagram fa-3x"></i></a>
                <a href="#"><i class="fab fa-youtube fa-3x"></i></a>
              </div>
            </div>
    
    
                <div class="footer-link">
                    <strong>localisation</strong>
                    <ul>
                        <li><a href="#">something</a></li>
                        <li><a href="#">something</a></li>
                        <li><a href="#">something</a></li>
                        <li><a href="#">something</a></li>
                    </ul>
                </div>
                <div class="footer-link">
                    <strong>quiqk links</strong>
                    <ul>
                        <li><a href="#">something</a></li>
                        <li><a href="#">something</a></li>
                        <li><a href="#">something</a></li>
                        <li><a href="#">something</a></li>
                    </ul>
                </div>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <!--==Using-JavaScript-File======================-->
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include 'Components/messages.php';?>

</body>
</html>



