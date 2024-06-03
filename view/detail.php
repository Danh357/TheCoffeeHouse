<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/detail.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
    <title>The Coffe House</title>
    
</head>
<body>
    <div class="container">
     <div class="banner">
        <img src="../image/banner5.jpg" id="img" onclick="changeImage()" alt="">
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
        <span>SẢN PHẨM-CHI TIẾT</span>
     </div>
 </div>
 <div class="all-Product">
    <a href="index.php?pg=sanpham">All-Product</a>
    </div>
 <div class="container2">
    <div class="wrapper-detail">
        <div class="image-detail">
            <img src="../upload/<?= $spchitiet['img']?>" alt="">
            <div class="image-other">
                <img src="../image/product-1-img-1.jpg" alt="">
                <img src="../image/product-1-img-2.jpg" alt="">
                <img src="../image/product-1-img-3.jpg" alt="">
            </div>
        </div>
        <div class="detail">          
            <span><?= $spchitiet['name']?></span>
            <a href=""><?= $spchitiet['price'] ?>$</a>
            <div class="icons-star">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <p>(1 customer review)</p>
            </div>           
           <!-- //mota -->          
         <p><?= $spchitiet['mota'] ?></p>
         <form action="index.php?pg=cart&sanphamchitiet&id=<?= $spchitiet['id'] ?>" method="post">
    <div class="buy-product">
        <input type="number" name="quantity" value="1" min="1">
        <input type="hidden" name="id" value="<?= $spchitiet['id'] ?>">
        <input type="hidden" name="name" value="<?= $spchitiet['name'] ?>">
        <input type="hidden" name="price" value="<?= $spchitiet['price'] ?>">
        <input type="hidden" name="img" value="<?= $spchitiet['img'] ?>">
        <button type="submit" name="buy">Mua Hàng</button>
    </div>
        </form>
        
            <div class="category">
                <p>SKU:<a href=""> PR111</a></p> 
                <p>CATEGORY:
                <?php 
                 if(isset($danhmuc) && count($danhmuc) >0){
                    foreach($danhmuc as $danhmucs){
                        ?>
                         
                         <a href="<?='index.php?pg=sanpham&catId='.$danhmucs['id']?>"><?=$danhmucs['name']?></a>
                         

                         <?php
                    }
                  }              
                ?>        
                </p>
                <p>TAGS:<a href="'"> Black</a>,<a class="btn1">Casual</a>,<a class="btn2" href="">Classic</a></p>
               <div class="icons-society">
                <p> SHARE:<a href=""> <i class="fa-brands fa-facebook-f"></i> <a href=""><i class="fa-brands fa-tiktok"></i></a> <a href=""><i class="fa-brands fa-square-instagram"></i></a> <a href=""><i class="fa-brands fa-twitter"></i></a></a></p>
               </div>
            </div>
            <div class="descriprtion">
                <button class="btn1">DESCRIPTION</button>
                <button class="btn2">additinal infomation</button>
                <button class="btn3">reviews(1)</button>
                <div class="descriprtion-p">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                </div>       
             </div>   
  <!-- //binhluan -->
                    <form action="index.php?pg=binhluansanphamchitiet&id=<?=$product['id']?>" method="POST">
                        <input  type="hidden" name="id_pro" value="<?=$product['id']?>">
                            <tr>
                                <td width="20%">Nhận xét</td>
                                <td><textarea required id="comment" name="noidung" rows="4" cols="50"></textarea></td>
                            </tr>
                            <tr>
                                <td width="20%"></td>
                                <td><button type="submit" name="capnhat" value="Submit">Nhận xét</button></td>
                            </tr>
                    </form>
                    <div class="binhluan">
                    <?php
                        if (isset($comments)) {
                            echo '<ul>';
                            foreach ($comments as $item) {
                            ?>
                            <li><?=$item['comment']?></li>
                            <?php
                            }
                            echo '</ul>';
                        }
                    ?>                
                     </div>
          

    <!-- //binhluan -->                
    </div>
    
 </div>
     
    </div>
 <!-- sanphamlienquan  -->
 
    <div class="container3">
       <div class="title-product">
        <span>SẢN PHẨM LIÊN QUAN</span>
       </div>
        <div class="related-products">
        <?php 
                 if(isset($splienquan) && count($splienquan) >0) {
                    foreach($splienquan as $splienquans){
                        ?>           
            <div class="box">
            <a href="<?='index.php?pg=sanphamchitiet&id='.$splienquans['id']?>"><img src="../upload/<?=$splienquans['img']?>" alt=""></a>
                <span><?= $splienquans['name'] ?></span>
                <a href=""><?= $splienquans['price'] ?>$</a>
                <p><?= $splienquans['mota'] ?></p>
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
    <div class="container6">
        <div class="wrapper-located">
            <div class="banner-footter">
                <img src="../image/footer-banner-img-1.jpg" alt="">
            </div>
        <div class="located">
            <img src="../image/logo.png" alt="">
            <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,               
                nostrud exercitation ullamco laboris.”</p>
            <h1>STORES</h1>
            <span>Địa chỉ: 143/43 Hà Thị Khiêm, Trung Mỹ Tây, Tp Hồ Chí Minh</span>
            <h3>NEWS AS FRESH AS OUR COFFEE</h3>
            <div class="gmail">
                <input type="text" placeholder="Địa Chỉ Email"><i class="fa-regular fa-envelope"></i>
            </div>   
            </div>
        </div>
    </div>
   
    <div class="container7">
        <div class="wp-footter">
        <div class="footter-menu">
        <span>© 2018 Qode Interactive, All Rights Reserved</span>
        <div class="menu-ft">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Liên Hệ</a></li>
        </ul>
      </div>
      <div class="app">
        <i class="fa-brands fa-square-facebook"></i>|
        <i class="fa-brands fa-tiktok"></i>|
        <i class="fa-brands fa-square-instagram"></i>|
        <i class="fa-brands fa-twitter"></i>|
        <i class="fa-brands fa-cc-amazon-pay"></i>
       </div>
     </div>
    </div>

        
        

   
</div>
<script src="../js/banner.js"></script>


