<style>
  body {
      background-image: url('../image/anh5.jpg');
      background-size: cover;
      background-position: center;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
  }

  .container16{
      max-width: 400px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .form-group {
      margin-bottom: 20px;
  }

  label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
  }

  input[type="email"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
  }

  button[type="submit"] {
      padding: 10px 20px;
      background-color: #333;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
  }

  button[type="submit"]:hover {
      background-color: #555;
  }
</style>
<body>
   
<div class="container16">
    <h2>Quên mật khẩu</h2>
    <form action="index.php?pg=quenmk" method="post">
        <div class="form-group">
            <label for="email">Nhập địa chỉ email của bạn:</label>
            <input type="email" id="email" name="email" placeholder="Email for you">
        </div>
        <button type="submit" name="guiyeucau">Gửi yêu cầu</button>
        <button type="reset">Nhập lại/reset</button>
        <button><a href="../contronller/index.php">home</a></button>
    </form>
    <div class="thongbao">
        <?php
        if (isset($thongbao) && ($thongbao != "")) {
            echo $thongbao;
        }
        ?>
    </div>
</div>

</body>