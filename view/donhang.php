<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
    <title>Thông tin đặt hàng</title>
    <style>

.container16 {
padding: 30px;
}
.container15 {
    margin-left: 147px;
    max-width: 1000px;
    background-color: #BE9C79;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    display: flex;
    color: #fff;
}

.info-user-oder {
    flex: 1;
    padding-right: 20px;
}

.info-user-oder h2 {
    font-family: 'Marcellus', serif;
    margin-bottom: 20px;
}
    

.info-user-oder input {
    width: 100%;
    margin-bottom: 10px;
    padding: 5px;
}

.info-product-oder {
    flex: 1;
    padding-left: 20px;
}

.info-product-oder h2 {
    font-family: 'Marcellus', serif;
    margin-bottom: 20px;
  
}

.info-product-oder table {
    width: 100%;
    border-collapse: collapse;
}

.info-product-oder th,
.info-product-oder td {
    padding: 5px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.info-product-oder .total {
    font-weight: bold;
}

.payment-method {
    margin-top: 20px;
}

.payment-method label {
    display: block;
    margin-bottom: 5px;
}

.payment-method input[type="radio"] {
    margin-right: 10px;
}

.thanhtoan {
    text-align: right;
    margin-top: 20px;
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
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    width: 440px;
    transition: 0.9s;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
    border: 1px solid #000;
    outline: none;
}

.thanhtoan {
    margin-top: 30px;
}

.thanhtoan button {
    color: #fff;
    font-size: 16px;
    margin-left: 10%;
    background-color: #5A1720;
    border: none;
    padding: 10px;
    width: 150px;
    transition: 0.9s;
}

.thanhtoan button:hover {
    background-color: #121212;
}
    </style>
</head>
<body>
    <div class="container16">

 
    <div class="container15">
        <div class="info-user-oder">
            <h2>THÔNG TIN ĐẶT HÀNG</h2>      
            <form action="index.php?pg=donhang" method="post">  
            <input type="hidden" name="tongthanhtoan" value="10">
                <label for="email">Họ và Tên:</label>
                <input type="text" id="name" name="hoten" placeholder="Họ Tên Người Nhận" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
                    
                <label for="text">Số điện Thoại:</label>
                <input type="text" id="dienthoai" name="dienthoai" placeholder="Số điện thoại" required>
        
                <label for="text">Địa Chỉ:</label>
                <input type="text" id="diachi" name="diachi" placeholder="Địa chỉ" required>
        
               
        </div>
        
        <div class="info-product-oder">
            <h2>THÔNG TIN SẢN PHẨM ĐÃ ĐẶT</h2>
            <table>
            <?php 
                if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    foreach($_SESSION['cart'] as $id => $product) {
                        $img = $product['img'];
                        $name = $product['name'];
                        $price = $product['price'];
                        $quantity = $product['quantity'];
                    ?>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                </tr>
                
               
                <tr>
                    <td><?=$name?></td>
                    <td><?=$price?></td>
                    <td><?=$quantity?></td>
                </tr>
                <?php
                                    }
                            } else {
                                echo 'Chưa có sản phẩm trong giỏ hàng.';
                            }
                                ?>
              
                <tr class="total">
                <?php
                        $totalTong = 0;
                        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
                        foreach ($_SESSION['cart'] as $product) {
                            $totalTong += $product['price'] * $product['quantity'];
                        }
                    }
                    ?>
                    <td colspan="2">Tổng đơn hàng:</td>
                    <td><?php echo number_format($totalTong, 0, ',', '.') ?>$</td></td>          
                </tr>
            </table>
            
            <div class="voucher">
                <h3>Voucher:</h3>
                <p>Mã giảm giá: ABC123</p>
                <p>Giảm giá: 10%</p>
            </div>
            <div class="payment-method">
                <h2>Phương thức thanh toán</h2>
                <label>
                    <input type="radio" name="pttt" value="1" checked>
                    Thanh toán khi nhận hàng (shipcode)
                </label>
                <label>
                    <input type="radio" name="pttt" value="2">
                    Thanh toán bằng thẻ tín dụng
                </label>
                <label>
                    <input type="radio" name="pttt" value="3">
                    Thanh toán qua chuyển khoản ngân hàng
                </label>
                
            </div>
          
            <div class="thanhtoan">
                <button type="submit" name="guiyeucau">Thanh Toán</button>
            </div>
            
            </form>

        </div>
    </div>
    </div>
</body>
</html>