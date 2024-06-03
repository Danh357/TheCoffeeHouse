<?php 
// Hàm để chèn dữ liệu vào bảng "bill"
function getbill_ID($madh, $id_user, $nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi, $total, $pttt) {
    $conn = connectdb();
    $sql = "INSERT INTO bill(madh, id_user, nguoidat_ten, nguoidat_email, nguoidat_tel, nguoidat_diachi, total, pttt) VALUES(?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$madh, $id_user, $nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi, $total, $pttt]);
    $conn = null;
    
  }
  
  // Hàm để chèn dữ liệu vào bảng "cart" và hiển thị thông tin người dùng đã mua hàng
  function cart_insert($id_pro, $price, $name, $img, $soluong, $thanhtien, $id_bill) {
    if ($id_pro !== null) {
      $conn = connectdb(); 
      $sql = "INSERT INTO `cart` (`id_pro`, `price`, `name`, `img`, `soluong`, `thanhtien`, `id_bill`) VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$id_pro, $price, $name, $img, $soluong, $thanhtien, $id_bill]);
      $conn = null;
      
        }    // Hiển thị thông tin người dùng đã mua hàng
  }
  function getLastInsertedID() {
    $conn = connectdb();
    $sql = "SELECT LAST_INSERT_ID()";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $lastInsertedID = $stmt->fetchColumn();
    $conn = null;
    return $lastInsertedID;
  }
  
  // Hàm để lấy thông tin người dùng theo ID từ bảng "user"
  function getUserByID($id) {
    $conn = connectdb();
    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;
    return $user;
  }
  
  
  // $iddh = taodonhang($tongthanhtoan, $nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi, $pttt, $madh);
  // if (isset($_POST['guiyeucau']) && $_POST['guiyeucau']) {
  //   // Lấy dữ liệu từ biểu mẫu
  //   $nguoidat_ten = $_POST['nguoidat_ten'];
  //   $nguoidat_email = $_POST['nguoidat_email'];
  //   $nguoidat_tel = $_POST['nguoidat_tel'];
  //   $nguoidat_diachi = $_POST['nguoidat_diachi'];
  //   $pttt = $_POST['pttt'];
  //   $madh = "TCFH" . rand(0, 999999);
  
  ?>
        case 'donhang':
                    if (isset($_POST['thanhtoan'])) {
                    $id_user = $id;
                    $nguoidat_ten = $_POST['nguoidat_ten'];
                    $nguoidat_diachi = $_POST['nguoidat_diachi'];
                    $nguoidat_email = $_POST['nguoidat_email'];
                    $nguoidat_tel = $_POST['nguoidat_tel'];
                    $pttt = $_POST['pttt'];
                
                    // Tạo tên người dùng và mật khẩu ngẫu nhiên
                    $username = "guest" . rand(1, 999);
                    $password = "12345";
                
                    // Chèn người dùng mới và lấy ID người dùng
                    $id_user = user_insertID($username, $password, $nguoidat_email, $nguoidat_diachi, $nguoidat_tel);
                
                    // Tạo mã đơn hàng duy nhất
                    $madh = "TCFH" . $id_user . "-" . date("His-dym");
                
                    // Lấy tổng số tiền của đơn hàng
                    $total = getTotal();
                
                    // Chèn thông tin đơn hàng vào bảng 'bill' và lấy lại ID đơn hàng
                    getbill_ID($madh, $id_user, $nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi, $total, $pttt);
                    $id_bill = getLastInsertedID(); // Hàm getLastInsertedID() trả về ID của đơn hàng mới chèn vào
                
                    // Chèn thông tin sản phẩm từ giỏ hàng vào bảng 'cart'
                    foreach ($_SESSION['cart'] as $sp) {
                        if (isset($sp['id_pro']) && isset($sp['soluong']) && isset($sp['thanhtien'])) {
                        cart_insert($sp['id_pro'], $sp['price'], $sp['name'], $sp['img'], $sp['soluong'], $sp['thanhtien'], $id_bill);
                        }
                    }
                
                    // Lấy thông tin người dùng đã mua hàng
                    $user = getUserByID($id_user);
                
                    include '../view/thongbao.php';
                    }
                
                    include '../view/donhang.php';
                    break;