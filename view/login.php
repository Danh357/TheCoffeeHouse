<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/login.css">
    <title>The Coffe House</title>
    
</head>
<body>
    <div class="background-image"></div>
    <div class="form-container">
    <?php 
           if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
              ?>
              <div class="back-home">         
                  <a  href="../contronller/index.php"><i class="fa-solid fa-house"></i>Home</a>
                  <a  href="../contronller/index.php?pg=update-info"><i class="fa-regular fa-user"></i>Update Tài Khoản</a>
                  <?php 
                      if ($_SESSION['user']['role'] === 1) {
                          echo '<a href="../admin/index.php"><i class="fa-solid fa-user-tie"></i>Admin</a>';
                      }
                      ?>
              <div class="name-login">
              <span>Tên Đăng Nhập: <?=$_SESSION['user']['username']?></span>
                <a href="index.php?pg=dangxuat">Đăng Xuất</a>
              </div>                         
              <?php
           }else{ 
          ?>
        
    <div class="from">
        <span><a href="../contronller/index.php"><i class="fa-solid fa-house"></i></a></span>
      <h2>Đăng Nhập</h2>
      
      <form action="index.php?pg=dangnhap" method="post">
        <label for="name">Họ và tên:</label>
        <input type="text" id="name" name="username"  placeholder="Full Name" required>
        
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" placeholder="Password" required>
       
        
        <input type="submit" name="dangnhap" value="Đăng Nhập">

        <div class="login-forpas">
        <a href="index.php?pg=dangky">Đăng Ký</a> <p>&</p> <a href="index.php?pg=quenmk">Quên Mật Khẩu</a>
        </div>
      

      </form>
        
    </div>
    
      <div class="logo">
      <?php
             if (isset($_SESSION['errorLogin']) && count($_SESSION['errorLogin']) >0)
              foreach ($_SESSION['errorLogin'] as $error) {
                echo '<span class="error-message">' . $error . '</span>';
              
              }         
              unset($_SESSION['errorLogin']);
              
              ?>
        <img src="../image/logo.png" alt="">
        <div class="icons-login">
          <i class="fa-brands fa-facebook-f"></i>
          <i class="fa-brands fa-twitter"></i>
          <i class="fa-brands fa-tiktok"></i>
          <i class="fa-brands fa-tumblr"></i>
          <i class="fa-brands fa-instagram"></i>
        </div>   
       
    </div>
    
    <?php
           }
           ?>
    
</div>
   
<script src="../js/banner.js"></script>
