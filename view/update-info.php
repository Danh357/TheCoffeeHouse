
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="background-image"></div>
    <div class="form-container">
        <div class="from">
      <span><a href="../contronller/index.php"><i class="fa-solid fa-house"></i></a></span>
      <h2>Cập Nhật Thông Tin Tài Khoản</h2>
      <?php 
        if (isset($_SESSION['user']) && (count($_SESSION['user']) > 0)){
          $username = $_SESSION['user']['username'];
          $email = $_SESSION['user']['email'];
          $password = $_SESSION['user']['password'];
          $dienthoai = $_SESSION['user']['dienthoai'];
          $diachi = $_SESSION['user']['diachi'];
        }
         if (isset($_SESSION['update_success'])): ?>
          <div class="success-message">
              <?= $_SESSION['update_success'] ?>
          </div>
          <?php unset($_SESSION['update_success']); ?>
      <?php endif; 
        ?>
      <form action="index.php?pg=update-info" method="post">
        <label for="name">Họ và tên:</label>
        <input type="text" id="name" name="name"  placeholder="Name" value="<?=$username?>">
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"   placeholder="Email"  value="<?=$email?>" required>
        
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" placeholder="Password" value="<?=$password?>" required>

        <label for="dienthoai">Số điện Thoại:</label>
        <input type="text" id="dienthoai" name="dienthoai" placeholder=" Number Phone" value="<?=$dienthoai?>"  required>

        <label for="password">Địa Chỉ:</label>
        <input type="text" id="diachi" name="diachi" placeholder=" AddDress" value="<?=$diachi?>" required>
        
        <input type="hidden" value="<?=$id?>" name="id">

        <input type="submit" value="Cập nhật" name="capnhat">

        <div class="login-forpas">
        <a href="index.php?pg=dangnhap">Về Đăng Nhập</a>
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
    </div>
</div>
<style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Marcellus', serif;
  }
  
.background-image {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: url('../image/anh5.jpg'); /* Đường dẫn tới hình nền */
  background-size: cover;
  filter: brightness(0.5);
  z-index: -1;
}

.form-container {
  display: grid;
  grid-template-columns: 50% 50%;
  gap: 30px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #5A1720;
  padding: 20px;
  width: 500px;
  border-radius: 10px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
}
.from span a{
  color: #fff;
}
.from span a:hover{
  color: #121212;
}
h2 {
  color: #fff;
  text-align: center;
  margin-bottom: 20px;
}
form {
  color: #fff;
  display: flex;
  flex-direction: column;
}

label {
  font-weight: bold;
  margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 5px;
  border: 1px solid #ddd;
  width: 250px;
}
input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus{
  border: 1px solid #000;
  outline: none;
}
input[type="submit"] {
  background-color: #BD9F81;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-left: 60px;
  width: 150px;
  margin-top: 10px;
}
input[type="submit"]:hover {
  background-color: #121212;
}
.login-forpas {
  display: flex;
  margin-top: 25px;
  width: 300px;
  padding-left: 10px;
}
.login-forpas a{
  letter-spacing: 2px;
  color: #000;
  font-size: 16px;
}
.login-forpas a:hover{
  color: #BD9F81;
}
.login-forpas p{
  padding: 10px;
  margin-top: -7px;
}
.error-message{
  color: #000;
  font-size: 15px;
  margin-left: -39px;
}
.error-message:hover{
  color: #BD9F81;
}
.logo img{
  margin-left: -5px;
  margin-top: 150px;
  width: 250px;
}
.form-container .name-login span{
  color: #f8f8f8;
}
.form-container .name-login a{
  padding: 20px;
  margin-left: 50px;
  color: green;
}
.name-login a:hover{
  color: #BD9F81;
}
.back-home :hover{
  color: #BD9F81;
}
.back-home a {
  text-decoration: none;
  color: rgb(0, 0, 0);
}
.back-home i{
  margin: 10px;
}
.icons-login{
  cursor: pointer;
  margin-top: -45px;
  margin-left: 35px;
  width: 300px;
  letter-spacing: 0.3em;
  padding: 20px;

}
.icons-login i{
  font-size: 22px;
  color: #fff;
}
.icons-login i:hover{
   color: #BD9F81;
}
</style>

