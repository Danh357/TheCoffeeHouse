<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
    <title>Admin The Coffe House</title>
</head>
<body>
    <style>
          body {

margin: 0;
padding: 0;
font-family: Arial, sans-serif;
}

.header {
font-family: 'Marcellus', serif;
background-color: #BD9F81;
color: #2A1710;
padding: 20px;
}

.header h1 {
margin: 0;
}
.header a{
    color: #fff;
    text-decoration: none;
}
.header a:hover{
    color: #5A1720;

}

.container {
display: flex;
}

.sidebar {
background-color: #f1f1f1;
width: 10%px;
padding: 20px;
}

.sidebar ul {
list-style-type: none;
padding: 0;
margin: 0;
}

.sidebar li {
margin-bottom: 10px;
}

.sidebar a {
font-size: 17px;
font-family: 'Marcellus', serif;
text-align: center;
text-decoration: none;
color: #333;
display: block;
padding: 10px;
background-color: #ddd;
border-radius: 5px;
}

.sidebar a:hover {
background-color: #BD9F81;
}
.content{
    width: 90%;
}
.content h2{
    display: flex;
    justify-content: center;
}
    </style>
    <div class="header">
        <h1><a href="index.php">ADMIN</a>
        <a href="/DA1/contronller/index.php">THE COFFE HOUSE</a>
    </h1>
    </div>
    <div class="container"> 
        <div class="sidebar">
            <ul>
                <li><a href="index.php?pg=thongke">Thống Kê</a></li>
                <li><a href="index.php?pg=quanlisp">Quản Lí Sản Phẩm </a></li>
                <li><a href="index.php?pg=quanlidm">Quản Lí Danh Mục </a></li>            
                <li><a href="index.php?pg=quanlitk">Quản Lí Tài Khoản</a></li>
                <li><a href="index.php?pg=quanlidh">Quản Lí Đơn Hàng</a></li>
                <li><a href="#">Quản Lí Khách Hàng</a></li>
                <li><a href="#">Quản Lí Liên Hệ</a></li>
                <li><a href="#">Quản Lí Bình Luận & Đánh Giá</a></li>
                <li><a href="index.php?pg=dangxuat">Đăng Xuất</a></li>
            </ul>
        </div>       
        <div>
        </div>