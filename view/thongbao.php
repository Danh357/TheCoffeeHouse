<!DOCTYPE html>
<html>
  <title>Thongbao</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<head>
    <style>
body{
  background-color: #BE9C79;
}
.thongbao {
  color: #fff;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 500px;
  padding: 20px;
  background-color: #5A1720;
  text-align: center;
}
.thongbao i{
  font-size: 20px;
  color: #fff;
  justify-content: start;
  display: flex;
}
.thongbao i:hover{
  color: #BE9C79;
}
.thongbao h2{
 
}
.thongbao p{
  font-size: 20px;
}


    </style>
</head>
<body>
    <div class="thongbao">
         <a href="index.php?pg=sanpham"><i class="fa-solid fa-house"></i></a>
        <h2>Thông báo đơn hàng</h2>
        <p>Đơn hàng của bạn sẽ được đóng gói và vận chuyển! Cảm ơn vì đã ủng hộ. Mã đơn hàng của quý khách là:
          <?=(isset($madh))?$madh:"";?>
        
        </p>
      </div>
      <div class="image">
        <img src="" alt="">
      </div>
</body>
</html>