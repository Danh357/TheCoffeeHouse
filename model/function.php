<?php
//user
function user_insertID($username,$password,$email,$diachi,$dienthoai){
  $conn=connectdb();
   $sql = "INSERT INTO `user` (username, password, email, diachi,dienthoai) VALUES (?,?, ?,?,?)";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$username,$password, $email, $diachi,$dienthoai]);
   $conn = null;
}
//user them
function addUser($data) {
  $conn = connectdb();
  
  // Kiểm tra xem người dùng đã tồn tại hay chưa
  $user = getUser($data['username']);
  if ($user) {
      return 0;
  }
  
  // Sử dụng câu lệnh truy vấn tham số hóa để thêm người dùng mới
  $sql = "INSERT INTO `user` (`username`, `password`, `diachi`, `email`, `dienthoai`, `role`) VALUES (?, ?, ?, ?, ?, '0')";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$data['username'], $data['password'], $data['diachi'], $data['email'], $data['dienthoai']]);
  
  // Trả về ID của người dùng mới được thêm vào
  return $conn->lastInsertId();
}
//kiem tra user 
function getUser($username){
    $conn=connectdb();
    $sql = " SELECT * FROM `user` WHERE username ='".$username."'";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetch();
    return $kq;
}
//dangnhap
function login($username,$password){
  $conn=connectdb();
  $sql = " SELECT * FROM `user` WHERE username ='".$username."' AND password ='".md5($password)."'";
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetch();
  return $result;
}
//capnhattaikhoan
function update_taikhoan($id, $username, $email, $password, $diachi, $dienthoai)
{
    $conn = connectdb();
    $sql = "UPDATE `user` SET username = :username, email = :email, password = :password, diachi = :diachi, dienthoai = :dienthoai WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':diachi', $diachi);
    $stmt->bindParam(':dienthoai', $dienthoai);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
//quenmk
// function checkEmail($email){
//   $conn = connectdb();
//   $sql = "SELECT * FROM `user` WHERE email = :email";
//   $stmt = $conn->prepare($sql);
//   $stmt->bindParam(':email', $email);
//   $stmt->execute();
//   $result = $stmt->fetch(PDO::FETCH_ASSOC);
//   return $result['email'];
// }

 //binhluan

//  function getAllComments($userId, $proID) {
//   $conn=connectdb();
//   $sql = "SELECT * FROM `binhluan` WHERE id_user = '".$userId."' AND id_pro = '".$proID."'";
//   $stmt = $conn->prepare($sql);
//   $stmt->execute();
//   $stmt->setFetchMode(PDO::FETCH_ASSOC);
//   $kq=$stmt->fetchAll(); // lấy nhiều dòng
//   return $kq;
// }

// function addBinhluan($id_user, $id_pro, $noidung) {
//   $conn=connectdb();
//   $sql = "INSERT INTO binhluan (`id_user`, `id_pro`, `noidung`) VALUES ('".$id_user."', '".$id_pro."', '".$noidung."')";
//   $conn->exec($sql);
// }

// function getAllComments($userId, $productId) {
//   $conn = connectdb();
//   $sql = "SELECT * FROM `binhluan` WHERE id_user = '".$userId."' AND id_pro = '".$productId."'";
//   $stmt = $conn->prepare($sql);
//   $stmt->execute();
//   $stmt->setFetchMode(PDO::FETCH_ASSOC);
//   $comments = $stmt->fetchAll(); // Lấy danh sách bình luận
//   return $comments;
// }


// function addComment($userId, $productId, $comment) {
//   $conn=connectdb();
//   $sql = "INSERT INTO binhluan (`id_user`, `id_pro`, `noidung`) VALUES ('".$userId."', '".$productId."', '".$comment."')";
//   $conn->exec($sql);
// }
//sanpham trang chủ
function getSanpham($catId = 0){
  $conn=connectdb();
  if($catId){
    $sql = " SELECT * FROM `sanpham`  WHERE id_dm =".$catId."";
  }else{
    $sql = " SELECT * FROM `sanpham`  LIMIT 4";
  }
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $kq = $stmt->fetchAll();
  return $kq;
}
//sanpham lien quan
// function getSanphamlq($catId = 0){
//   $conn=connectdb();
//   if($catId){
//     $sql = " SELECT * FROM `splienquan`  WHERE id_dm =".$catId."";
//   }else{
//     $sql = " SELECT * FROM `splienquan`  LIMIT 4";
//   }
//   $stmt=$conn->prepare($sql);
//   $stmt->execute();
//   $stmt->setFetchMode(PDO::FETCH_ASSOC);
//   $kq = $stmt->fetchAll();
//   return $kq;
// }
//danhmuc all
function getDanhmuc(){
  $conn=connectdb();
  $sql = " SELECT * FROM `danhmuc` ORDER BY id DESC";
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $kq = $stmt->fetchAll();
  return $kq;
}
//laytatcasanpham,timkiemsanpham

function getAllsanpham($kyw, $catId = 0) {
  $conn = connectdb();

  if ($catId) {
      $sql = "SELECT * FROM `sanpham` WHERE id_dm = :catId AND name LIKE :kyw ORDER BY id DESC LIMIT 15";
  } else {
      $sql = "SELECT * FROM `sanpham` WHERE name LIKE :kyw ORDER BY id DESC LIMIT 15";
  }

  $stmt = $conn->prepare($sql);
  $kyw = "%" . $kyw . "%";
  $stmt->bindParam(':kyw', $kyw);

  if ($catId) {
      $stmt->bindParam(':catId', $catId);
  }
  $stmt->execute();
  $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $kq;
}
//sanphamchitiet
function getCTsanpham($productId){
   $sql = " SELECT * FROM `sanpham` WHERE id =".$productId." ";
  $conn=connectdb();
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $kq = $stmt->fetch();
  return $kq;

}
function getCTsanphamlq($productId){
  $sql = " SELECT * FROM `splienquan` WHERE id =".$productId." ";
 $conn=connectdb();
 $stmt=$conn->prepare($sql);
 $stmt->execute();
 $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $kq = $stmt->fetch();
 return $kq;

}
function getSanphamLienquan($id_dm, $productId) {
  $sql = "SELECT * FROM `sanpham` WHERE id_dm = :id_dm AND id != :productId LIMIT 4";
  $conn = connectdb();
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id_dm', $id_dm, PDO::PARAM_INT);
  $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
  $stmt->execute();
  $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $kq;
}
// themvaogiohang
function addToCart($id, $name, $price, $img, $quantity = 1) {
  if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();
  }

  // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
  if (isset($_SESSION['cart'][$id])) {
      // Nếu đã có, tăng số lượng sản phẩm
      $_SESSION['cart'][$id]['quantity'] += $quantity;
      $_SESSION['cart'][$id]['total'] = $_SESSION['cart'][$id]['quantity'] * $price;
  } else {
      // Nếu chưa có, thêm sản phẩm mới vào giỏ hàng
      $_SESSION['cart'][$id] = array(
          'name' => $name,
          'price' => $price,
          'img' => $img,
          'quantity' => $quantity,
          'total' => $quantity * $price
      );
  }
   $_SESSION['success_message'] = 'Sản phẩm đã được thêm vào giỏ hàng';
}
// giảm số lượng 
function giamSoluong($id) {
  if (isset($_SESSION['cart'][$id])) {
      // Giảm số lượng sản phẩm đi 1
      $_SESSION['cart'][$id]['quantity'] -= 1;
      // Kiểm tra nếu số lượng sản phẩm nhỏ hơn hoặc bằng 0, xóa sản phẩm khỏi giỏ hàng
      if ($_SESSION['cart'][$id]['quantity'] <= 0) {
          removeFromCart($id);
      } else {
          // Cập nhật tổng giá tiền khi giảm số lượng
          $_SESSION['cart'][$id]['total'] = $_SESSION['cart'][$id]['quantity'] * $_SESSION['cart'][$id]['price'];
      }
  }
}
// //xoá 1 sản phẩm trong giỏ hàng
function removeFromCart($id) {
  if (isset($_SESSION['cart'][$id])) {
      unset($_SESSION['cart'][$id]);
  }
}

function updateSoluong($id, $quantity) {
  // Cập nhật số lượng sản phẩm trong giỏ hàng
  $_SESSION['cart'][$id]['quantity'] = $quantity;
  
  // Tính lại tổng số tiền của sản phẩm
  $price = $_SESSION['cart'][$id]['price'];
  $total = $price * $quantity;
  $_SESSION['cart'][$id]['total'] = $total;
}
//tong cong tien tat ca san pham trong gio hangg
function getTotal() {
  $totalAmount = 0;

  foreach ($_SESSION['cart'] as $product) {
      $totalAmount += $product['price'] * $product['quantity'];
  }

  return $totalAmount;
}

function getAllsanphamtimkiem($catId = 0, $keyword = '') {
  $conn = connectdb();
  if ($catId) {
      $sql = "SELECT * FROM `sanpham` WHERE id_dm = :catId AND (name LIKE :keyword OR mota LIKE :keyword)";
  } else {
      $sql = "SELECT * FROM `sanpham` WHERE name LIKE :keyword OR mota LIKE :keyword ";
  }
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':catId', $catId);
  $stmt->bindValue(':keyword', '%' . $keyword . '%');
  $stmt->execute();
  $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $kq;
}
//don hàng
function user_insert_id($username, $password,$ten, $diachi, $email, $dienthoai) {
  $conn = connectdb();
  $sql = "INSERT INTO user (username,password, ten, diachi, email, dienthoai) VALUES (?, ?, ?, ?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$username, $password,$ten, $diachi, $email, $dienthoai]);
  return $conn->lastInsertId();
}

function bill_insert_id($madh, $id_user, $nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi, $total, $pttt){
  $conn = connectdb();
   $sql = "INSERT INTO bill (madh, id_user, nguoidat_ten, nguoidat_email, nguoidat_tel, nguoidat_diachi, total, pttt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$madh, $id_user, $nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi,$total,$pttt]);
  return $conn->lastInsertId();
}
function cart_insert($id_pro, $price, $name, $img, $soluong, $thanhtien, $id_bill) {
  $conn = connectdb();
  $sql = "INSERT INTO cart (id_pro, price, name, img, soluong, thanhtien, id_bill) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id_pro, $price, $name, $img, $soluong, $thanhtien, $id_bill]);
}

// function taodonhang($tongthanhtoan, $nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi, $pttt, $madh) {
//   $conn = connectdb();
//   $sql = "INSERT INTO `bill` (tongthanhtoan, nguoidat_ten, nguoidat_email, nguoidat_tel, nguoidat_diachi, pttt, madh) 
//   VALUES('".$tongthanhtoan."','".$nguoidat_ten."','".$nguoidat_email."','".$nguoidat_tel."','".$nguoidat_diachi."','".$pttt."','".$madh."')";
//   $conn->exec($sql);
//   $last_id = $conn->lastInsertId();
//   return $last_id;
// }
// function addOrder($data) {
//   $conn = connectdb();

//   // Kiểm tra xem 'id_user' đã được truyền vào hay chưa
//   if (!isset($data['id_user'])) {
//     // Xử lý lỗi hoặc trả về giá trị mặc định nếu cần thiết
//     return false;
//   }
  
//   // Tạo mã đơn hàng duy nhất
//   $madh = "TCFH" . $data['id_user'] . "-" . date("His-dym");
  
//   // Sử dụng câu lệnh truy vấn tham số hóa để thêm thông tin đơn hàng mới
//   $sql = "INSERT INTO `bill` (`madh`, `id_user`, `nguoidat_ten`, `nguoidat_email`, `nguoidat_tel`, `nguoidat_diachi`, `total`, `pttt`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
//   $stmt = $conn->prepare($sql);
//   $stmt->execute([$madh, $data['id_user'], $data['nguoidat_ten'], $data['nguoidat_email'], $data['nguoidat_tel'], $data['nguoidat_diachi'], $data['total'], $data['pttt']]);
//   $id_bill = $conn->lastInsertId();
  
//   // Thêm thông tin sản phẩm vào giỏ hàng
//   foreach ($_SESSION['cart'] as $sp) {
//       cart_insert($sp['id_pro'], $sp['price'], $sp['name'], $sp['img'], $sp['soluong'], $sp['thanhtien'], $id_bill);
//   }
  
//   // Trả về ID của đơn hàng mới được tạo
//   return $id_bill;
// }

//lấy lại mật khẩu

// function sendCSM($mail_nhan, ,$ten_nhan, $chu_de, $noi_dung, $bcc)
// global $site_mail, $site_pass;
// $bcc = 'Đỗ Công Danh';
// $mail= new PHPMailer();
// $mail -> SMTDebug = 0;
// $mail -> DEbugoutput= "html";
// $mail -> isSMT();
// $mail -> Host = 'smtp.gmail.com';
// $mail -> SMTPAuth = true;
// $mail -> Username = $site_gmail;//gmail người gửi
// $mail -> Password = $site_pass;//pass
// $mail -> SMTPSecure = 'tls';
// $mail -> Post = 587;
// $mail -> setFrom($site_gmail, $bcc);
// $mail -> addAddress($mail_nhan, $ten_nhan) = $site_pass;
// $mail -> isHTML(true);
// $mail -> Subject = $chu_de;
// $mail -> Body = $noi_dung;
// $mail -> CharSet = 'UTF-8';
// $send = $mail -> send();
// return $send;


//ADMIN//ADMIN//ADMIN//ADMIN//ADMIN//ADMIN//ADMIN//ADMIN//ADMIN//ADMIN//ADMIN//ADMIN//ADMIN//ADMIN//ADMIN//ADMIN

//sanpham//sanpham//sanpham//sanpham//sanpham//sanpham//sanpham//sanpham//sanpham//sanpham//sanpham//sanpham
function getAllSPadmin_new($page, $soluongsp) {
  $conn = connectdb();
  if ($page == "" || $page == 0 || $page == "all") {
    $sql = "SELECT * FROM `sanpham` WHERE id_dm ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
  } else {
    $batdau = ($page - 1) * $soluongsp;
    $sql = "SELECT * FROM `sanpham` WHERE id_dm ORDER BY id DESC LIMIT :batdau, :soluongsp";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':batdau', $batdau, PDO::PARAM_INT);
    $stmt->bindValue(':soluongsp', $soluongsp, PDO::PARAM_INT);
  }
  
  $stmt->execute();
  $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $kq;
}
//hienthi
function sanpham_insert($id,$name,$img,$price,$mota, $id_dm){
  $conn=connectdb();
   $sql = "INSERT INTO `sanpham` (id,name, img, price, mota, id_dm) VALUES (?,?, ?, ?, ?, ?)";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id,$name, $img, $price, $mota, $id_dm]);
   $conn = null;
}
//xoa
function deletesp($id){
  $conn=connectdb();
  $sql = "DELETE FROM `sanpham` WHERE id=$id";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $kq=$stmt->fetch(); // lấy nhiều dòng
  return $kq;
}
  //sua sp
  function fixSanpham($id, $name, $img, $price, $mota, $id_dm) {
    $conn = connectdb();
    $sql = "UPDATE `sanpham` SET `name` = ?, `img` = ?, `price` = ?, `mota` = ?, `id_dm` = ? WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $img, $price, $mota, $id_dm, $id]);
}

function getoneSanpham($id) {
    $conn = connectdb();
    $sql = "SELECT * FROM `sanpham` WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function uploadImage($file) {
  // Thư mục lưu trữ hình ảnh tải lên
  $targetDir = "../upload/";

  // Lấy thông tin về tên file và đường dẫn tạm thời của file tải lên
  $fileName = basename($file["name"]);
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

  // Kiểm tra xem file có phải là hình ảnh hay không
  $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
  if (in_array($fileType, $allowedTypes)) {
      // Di chuyển file tạm thời vào thư mục lưu trữ
      if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
          return $fileName;
      } else {
          echo "Lỗi: Không thể tải lên hình ảnh.";
      }
  } else {
      echo "Lỗi: Chỉ chấp nhận tệp hình ảnh có định dạng JPG, JPEG, PNG hoặc GIF.";
  }
  return null;
}
//sanpham lien quan
// function getAllSPlqadmin_new(){
//   $conn=connectdb();
//   $sql = "SELECT * FROM `splienquan` WHERE id_dm ORDER BY id DESC";
//   $stmt = $conn->prepare($sql);
//   $stmt->execute();
//   $stmt->setFetchMode(PDO::FETCH_ASSOC);
//   $kq=$stmt->fetchAll(); // lấy nhiều dòng
//   return $kq;
// }
// function sanphamlq_insert($id,$name,$img,$price,$mota, $id_dm){
//   $conn=connectdb();
//    $sql = "INSERT INTO `splienquan` (id,name, img, price, mota, id_dm) VALUES (?,?, ?, ?, ?, ?)";
//    $stmt = $conn->prepare($sql);
//    $stmt->execute([$id,$name, $img, $price, $mota, $id_dm]);
//    $conn = null;
// }
// function deletesplq($id){
//   $conn=connectdb();
//   $sql = "DELETE FROM `splienquan` WHERE id=$id";
//   $stmt = $conn->prepare($sql);
//   $stmt->execute();
//   $stmt->setFetchMode(PDO::FETCH_ASSOC);
//   $kq=$stmt->fetch(); // lấy nhiều dòng
//   return $kq;
// }
// function fixSanphamlq($id, $name, $img, $price, $mota, $id_dm) {
//   $conn = connectdb();
//   $sql = "UPDATE `splienquan` SET `name` = ?, `img` = ?, `price` = ?, `mota` = ?, `id_dm` = ? WHERE `id` = ?";
//   $stmt = $conn->prepare($sql);
//   $stmt->execute([$name, $img, $price, $mota, $id_dm, $id]);
// }

// function getoneSanphamlq($id) {
//   $conn = connectdb();
//   $sql = "SELECT * FROM `splienquan` WHERE id = ?";
//   $stmt = $conn->prepare($sql);
//   $stmt->execute([$id]);
//   $result = $stmt->fetch(PDO::FETCH_ASSOC);
//   return $result;
// }
// function uploadImagelq($file) {
// // Thư mục lưu trữ hình ảnh tải lên
// $targetDir = "../upload/";

// // Lấy thông tin về tên file và đường dẫn tạm thời của file tải lên
// $fileName = basename($file["name"]);
// $targetFilePath = $targetDir . $fileName;
// $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

// // Kiểm tra xem file có phải là hình ảnh hay không
// $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
// if (in_array($fileType, $allowedTypes)) {
//     // Di chuyển file tạm thời vào thư mục lưu trữ
//     if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
//         return $fileName;
//     } else {
//         echo "Lỗi: Không thể tải lên hình ảnh.";
//     }
// } else {
//     echo "Lỗi: Chỉ chấp nhận tệp hình ảnh có định dạng JPG, JPEG, PNG hoặc GIF.";
// }
// return null;
// }
//danhmuc//danhmuc//danhmuc//danhmuc//danhmuc//danhmuc//danhmuc//danhmuc//danhmuc//danhmuc//danhmuc//danhmuc//danhmuc
function deletedm($id){
  $conn=connectdb();
  $sql = "DELETE FROM `danhmuc` WHERE id=$id";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $kq=$stmt->fetch(); // lấy nhiều dòng
  return $kq;
}

function danhmuc_insert($name,$id){
  $conn=connectdb();
   $sql = "INSERT INTO `danhmuc` (name,id) VALUES (?, ?)";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$name, $id]);
   $conn = null;
} 

function fixDanhmuc($id, $name) {
  $conn=connectdb();
  $sql = "UPDATE `danhmuc` SET `name` = '".$name."' WHERE `danhmuc`.`id` = " . $id;
  $conn->exec($sql);
}

function getOneDanhmuc($id) {
  $conn=connectdb();
  $sql = "SELECT * FROM `danhmuc` WHERE id = " . $id;
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetch(); // Lấy 1 dòng
  return $result;
}
function getUserInfo() {
  $conn = connectdb();
  $sql = "SELECT email, username, id, diachi, dienthoai FROM `user`";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}





?>

