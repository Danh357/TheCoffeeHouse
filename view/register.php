<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/register.css">
    <title>The Coffe House</title>
    
</head>
<body>
    <div class="background-image"></div>
    <div class="form-container">
        <div class="from">
        <span><a href="../contronller/index.php"><i class="fa-solid fa-house"></i></a></span>
      <h2>Đăng ký</h2>
      
      <form action="index.php?pg=dangky" method="post">
        <label for="name">Họ và tên:</label>
        <input type="text" id="name" name="username"  placeholder="Full Name">
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"   placeholder="Email" required>
        
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" placeholder="Password" required>

        <label for="password">Số điện Thoại:</label>
        <input type="text" id="dienthoai" name="dienthoai" placeholder=" Number Phone" required>

        <label for="password">Địa Chỉ:</label>
        <input type="text" id="diachi" name="diachi" placeholder=" AddDress" required>
        
        <input type="submit" name="dangky" value="Đăng ký">

        <div class="login-forpas">
        <a href="index.php?pg=dangnhap">Đăng Nhập</a> <p>&</p> <a href="#">Quên Mật Khẩu</a>
        </div>
        
      </form>
    </div>
      <div class="logo">
        <img src="../image/logo.png" alt="">
        <div class="icons-login">
          <i class="fa-brands fa-facebook-f"></i>
          <i class="fa-brands fa-twitter"></i>
          <i class="fa-brands fa-tiktok"></i>
          <i class="fa-brands fa-tumblr"></i>
          <i class="fa-brands fa-instagram"></i>
          </div>
          <div class="echo">
             <?php
             if (isset($id) && $id >0) echo '"Bạn đã đăng ký thành công! hihi"';
                else if(isset($id) && $id==0) echo "Username đã tồn tại";
              ?>
           </div>    
     </div>
  </div>

   
<script src="../js/banner.js"></script>
