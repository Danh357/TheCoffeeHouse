<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../css/list-product.css">
   
    <title>Document</title>
</head>
<body>
<div class="container">
<div class="banner">
        <img src="../image/banner1.jpg" id="img" onclick="changeImage()" alt="">
        <a class="bar-back" href="#">
            <span>__</span>
        </a>
     </div>
         <div class="logo-menu">       
                <img src="../image/logo.png" alt="">      
                <ul>
                <li><a href="../contronller/index.php">HOME</a></li>
                <li><a href="index.php?pg=sanpham">MENU</a></li>
                <li><a href="#">SHOP</a></li>
                <li><a href="index.php?pg=lienhe">Liên Hệ</a></li>
                <li><a href="#">About Me</a></li>     
                <li><a href="#"><i class="fa-solid fa-magnifying-glass"></i></a></li>    
                <li><a href="index.php?pg=dangnhap"><i class="fa-solid fa-user"></i></a></li>     
                <li><a href="index.php?pg=cart"><i class="fa-solid fa-cart-shopping"></i></a></li>  
                <li><a href="#"><i class="fa-solid fa-bars" onclick="toggleDropdown(event)"></i></a></li>  
                    <div class="bars"></div>
                    <div class="in-bars" id="dropdownContent">
                        <span class="dau-x" onclick="toggleDropdown(event)">&times;</span>
                        <img src="../image/logo.png" alt="">
                        <p>Lorem ipsum dolor sit amet, consecteturadip iscing elit, sed do eiusmod tempor incididunt ut labore et dolore sit.</p>
                        <a href="">docongdanh357@gmail.com</a>
                        <a href="">+84 967400391</a>
                       <div class="icons-bars">
                       <i class="fa-brands fa-instagram"></i>
                       <i class="fa-brands fa-facebook-f"></i>
                       <i class="fa-brands fa-tiktok"></i>
                       <i class="fa-brands fa-twitter"></i>

                       </div>
                 </div>                   
            </ul>   
        </div>
        <div class="title-header">
             <span>DANH SÁCH-SẢN PHẨM</span>
        </div> 
</div>
<?php  if (isset($_SESSION['success_message'])) {
            echo '<div  id="success-message" class="success-message animate">' . $_SESSION['success_message'] . '</div>';
            unset($_SESSION['success_message']);
        }?>
    <div class="container2">
    <div class="wp-product">
  <div class="product">
    <?php 
    if(isset($allsanpham) && count($allsanpham) > 0) {
        
      foreach($allsanpham as $allsanphams) {
       
        
        ?>        
        <div class="box">   
            <form action="index.php?pg=cart" method="POST">  
                <div class="image-wrapper">
                  <a href="<?='index.php?pg=sanphamchitiet&id='.$allsanphams['id']?>"><img src="../upload/<?=$allsanphams['img']?>" alt=""></a>
                  <button class="tgh" type="submit" name="add_to_cart">
                  <i class="fas fa-shopping-cart"></i>
                  </button>
                </div>
                <div class="danh">                      
                  <span><?=$allsanphams['name']?></span>
                  <p><?=$allsanphams['price']?>$</p>
                  <input type="number" name="quantity" value="1" min="1">
                  <input type="hidden" name="id_pro" value="<?= $allsanphams['id'] ?>">
                  <input type="hidden" name="id" value="<?= $allsanphams['id'] ?>">
                  <input type="hidden" name="name" value="<?= $allsanphams['name'] ?>">
                  <input type="hidden" name="price" value="<?= $allsanphams['price'] ?>">
                  <input type="hidden" name="img" value="<?= $allsanphams['img'] ?>">
                  <button class="btna" type="submit" name="buy">
                      Mua Hàng
                  </button>
                </div>
            </form>   
        </div>
      <?php
      }
    } 
    else {
      echo 'Chưa có sản phẩm nào!';
    }             
    ?>
  </div>
</div>
<script>
    setTimeout(function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 5000);
</script>
        <div class="wp-category">
           <!-- timkiem -->
            
              <form action="index.php?pg=sanpham" method="post">
               <div class="seach">
                  <input type="text" placeholder="Tìm kiếm sản phẩm" name="kyw">               
                  <input class="timkiem" type="submit" value="GO" name="timkiem">
               </div>
                <div class="icon">
                   <i class="fa-solid fa-magnifying-glass"></i>          
                </div>
            </form>
           
             <!-- timkiem -->
            
            <div class="category">
            <span><a href="index.php?pg=sanpham">Danh mục Sản Phẩm</a></span>
            <?php 
                 if(isset($danhmuc) && count($danhmuc) >0){
                    foreach($danhmuc as $danhmucs){
                        ?>
                         
                           <a href="<?='index.php?pg=sanpham&catId='.$danhmucs['id']?>"><?=$danhmucs['name']?></a>
                         

                         <?php
                    }
                  }              
                ?>        
              </div>

            <div class="Related">
                <span>Sản Phẩm Liên Quan</span>
                <?php 
 if(isset($danhMuc29) && count($danhMuc29) > 0) {
        
  foreach($danhMuc29 as $danhMuc29s) {    
    ?>        
                
            <div class="wp-Related">
                <div class="Related-img">
                <a href="<?='index.php?pg=sanphamchitiet&id='.$danhMuc29s['id']?>"><img src="../upload/<?=$danhMuc29s['img']?>" alt=""></a>
                </div>
                <div class="Related-product">
                  <a href=""><?=$danhMuc29s['name']?></a>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <a href=""><?=$danhMuc29s['price']?>$</a>
            </div>
            </div>  
                  <?php
      }
    } 
    else {
      echo 'Chưa có sản phẩm nào!';
    }             
    ?>
    


            </div>
        </div>
    </div>
   
    
   
    <script src="../js/bn-listprd.js"></script>
