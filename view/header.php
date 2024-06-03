<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/index.css">
    <title>The Coffe House</title>
    
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
        </div>
     
    </div>
<script src="../js/banner.js"></script>

