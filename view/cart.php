<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
    <title>The Coffe House</title>
    
</head>
<body>
    <div class="container">
        <div class="banner">
           <img src="../image/banner7.jpg" id="img" onclick="changeImage()" alt="">
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
                <span>GIỎ HÀNG</span>
           </div> 
    </div>

 <!-- body -->
    <div class="container2">
        <table class="cart-table">
            <thead>
              <tr>
                <th></th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng cộng</th>
                <th>CN Số Lượng</th>
                <th>Xóa</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php 
                if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    foreach($_SESSION['cart'] as $id => $product) {
                        $img = $product['img'];
                        $name = $product['name'];
                        $price = $product['price'];
                        $quantity = $product['quantity'];
                    ?>
              
                 <tr>
                    <td><img src="../upload/<?= $img ?>"></td>
                    <td><?=$name?></td>
                    <td><?=$price?></td>

                    <form action="index.php?pg=cart&action=update_quantity&id=<?= $id ?>" method="POST">
                            <td>
                                <input class="quantity" type="number" name="quantity" min="1" value="<?= $quantity ?>">
                            </td>
                            <td>
                                <?php echo number_format($_SESSION['cart'][$id]['total'], 0, ',', '.') ?> $
                                
                            </td>
                            <td>
                                <button type="submit" name="update_quantity">Cập Nhật Khi Sửa Số Lượng</button>
                            </td>
                    </form>
                

                        <form action="index.php?pg=cart&delete=remove&id=<?= $id ?>" method="POST">
                            <td> 
                                <button class="remove-button" type="submit" name="remove_from_cart"><i class="fa-solid fa-xmark"></i></button>
                            </td>  
                        </form>
                </tr>          
                            <?php
                                    }
                            } else {
                                echo 'Chưa có sản phẩm trong giỏ hàng.';
                            }
                                ?>
            </tbody>
        </table>

        <div class="button-reset">
            <input class="code" type="text" placeholder="Coupon Code">
            <button><a href="">Mã Giảm Giá</a></button>
            <button><a href="index.php?pg=sanpham">Trang Sản Phẩm</a></button>
        </div>        
        <div class="cart-totals">   
            <p>Tổng Tiền</p>
            <table class="totals">
                <?php
                        $totalTong = 0;
                        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
                        foreach ($_SESSION['cart'] as $product) {
                            $totalTong += $product['price'] * $product['quantity'];
                        }
                    }
                    ?>
                            <td class="td1">Tổng tiền:</td>
                            <td><?php echo number_format($totalTong, 0, ',', '.') ?>$</td></td>                               
            </table>           
        </div>
        
                 <div class="thanhtoan">
                   <a href="index.php?pg=donhang">
                   <button type="submit" name="">Tiếp Tục Thanh Toán</button>
                   </a> 
                </div>   
                  
 </div> 
<!-- footer -->
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

<script src="../js/cart.js"></script>        