<?php 
session_start();
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
    include '../model/connectdb.php';
    include '../model/function.php';

  ?>
  <?php
    if(isset($_GET['pg'])){
        switch ($_GET['pg']){
            case 'lienhe':
                include '../view/contact.php';
                break;
                // case 'quenmk':
                //     $thongbao = ""; // Khai báo biến $thongbao trước khi sử dụng
                
                //     if (isset($_POST['guiyeucau']) && $_POST['guiyeucau']) {
                //         $email = $_POST['email'];
                //         $checkemail = checkEmail($email);
                
                //         if (is_array($checkemail)) {
                //            echo'mật khẩu của bạn là'. $checkemail['username'];
                //         } else {
                //             $thongbao = 'Email này không tồn tại';
                //         }
                //     }
                
                    include '../view/quenmk.php';
                    break;
            case 'dangxuat':
                    unset($_SESSION['user']);
                    header('location: index.php?pg=dangnhap');
                    break;
                    case 'dangnhap':
                        if (isset($_POST['dangnhap'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $error = array();
                    
                            if (empty($username)) {
                                $error['username'] = 'Username không được rỗng';
                            }
                            if (empty($password)) {
                                $error['password'] = 'Mật khẩu không được rỗng';
                            }
                    
                            if (empty($error)) {
                                $user = login($username, $password);
                                if ($user) {
                                 // Khởi động session
                                    if (!isset($_SESSION['user'])) {
                                        $_SESSION['user'] = array();
                                    }
                                    $_SESSION['user']['username'] = $user['username'];
                                    $_SESSION['user']['password'] = $user['password'];
                                    $_SESSION['user']['email'] = $user['email'];
                                    $_SESSION['user']['dienthoai'] = $user['dienthoai'];
                                    $_SESSION['user']['diachi'] = $user['diachi'];
                                    $_SESSION['user']['uid'] = $user['id'];
                                    $_SESSION['user']['role'] = $user['role'];
                    
                                    if ($_SESSION['user']['role'] == 1) {
                                        header("Location: ../admin/index.php");
                                        exit;
                                    } else {
                                        echo 'Chào Mừng Bạn Quay Trở lại';
                                    }
                                } else {
                                    $_SESSION['errorLogin'] = array('wrongLogin' => 'Username hoặc mật khẩu không đúng');
                                }
                            } else {
                                $_SESSION['errorLogin'] = $error;
                            }
                        }
                        include '../view/login.php';
                        break;
                
            case 'dangky':
                if(isset($_POST['dangky'])){
                    $email=isset($_POST['email']) ? $_POST['email'] :'n/a';
                    $username=isset($_POST['username']) ? $_POST['username'] :'n/a';
                    $password=isset($_POST['password']) ? $_POST['password'] :'n/a';
                    $dienthoai=isset($_POST['dienthoai']) ? $_POST['dienthoai'] :'n/a';
                    $diachi=isset($_POST['diachi']) ? $_POST['diachi'] :'n/a';
                    $data = [
                        'email' => $email,
                        'username' => $username,
                        'password' => md5($password),
                        'dienthoai' =>$dienthoai,
                        'diachi' =>$diachi,
                    ]; 
                   $id = addUser($data);
                  
                }
                include '../view/register.php';
                break;   
                case 'update-info':
                    if (!isset($_SESSION['user'])) {
                        header('Location: index.php');
                        exit;
                    }
                
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['capnhat'])) {
                            $username = $_POST['name'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $dienthoai = $_POST['dienthoai'];
                            $diachi = $_POST['diachi'];
                            $id = $_SESSION['user']['uid'];
                            $role = $_SESSION['user']['role'];
                
                            // Kiểm tra nếu mật khẩu được cung cấp
                            if (!empty($password)) {
                                $password = md5($password); // Mã hóa mật khẩu
                            } else {
                                // Nếu mật khẩu không được cung cấp, giữ nguyên mật khẩu hiện tại
                                $password = $_SESSION['user']['password'];
                            }
                
                            update_taikhoan($id, $username, $email, $password, $diachi, $dienthoai);
                
                            $_SESSION['user']['username'] = $username;
                            $_SESSION['user']['email'] = $email;
                            $_SESSION['user']['password'] = $password;
                            $_SESSION['user']['diachi'] = $diachi;
                            $_SESSION['user']['dienthoai'] = $dienthoai;
                            $_SESSION['update_success'] = 'Cập nhật thông tin thành công!';
                        }                         
                    }                      
                    include '../view/update-info.php';
                    break;
                
            case 'danhmuc':  
                $catId = isset($_GET['catId']) ? (int)$_GET['catId'] : 0 ; 
                $danhmuc = getDanhmuc($catId);
              
                include '../view/list-product.php';               
                    break; 
                    
            case 'sanpham':   
                $kyw = isset($_POST['kyw']) ? $_POST['kyw'] : '';
               $catId = isset($_GET['catId']) ? (int)$_GET['catId'] : 0 ;
               $danhMuc29 = getSanpham(29);
               $allsanpham = getAllsanpham($kyw,$catId);
               $danhmuc = getDanhmuc();      
            //    $sanphamlienquan = getSanphamlq($catId);
                include '../view/list-product.php'; 
                              
                    break;          
            case 'sanphamchitiet':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $productId = $_GET['id'];
                    $spchitiet = getCTsanpham($productId);  
                    // $spchitiets = getCTsanphamlq($productId);  
                    $id_dm= $spchitiet['id_dm'];
                    $splienquan =  getSanphamLienquan($id_dm, $productId);                
                    if ($spchitiet) {
                        include '../view/detail.php';
                    } else {
                        echo 'Sản phẩm không tồn tại!';
                    }
                } else {
                    echo 'Thiếu thông tin sản phẩm!';
                }
                break;

                // case 'binhluan':
                //     if ($_POST['capnhat']) {
                //         $productId = isset($_POST['id_pro']) ? $_POST['id_pro'] : 'n/a';
                //         $comment = isset($_POST['noidung']) ? $_POST['noidung'] : 'n/a';
                //         if (isset($_SESSION['user']['id_user']) && $productId) {
                //             addComment($_SESSION['user']['id_user'], $productId, $comment);
                //             header("Location: index.php?pg=sanphamchitiet&id=".$productId);
                //         }
                //     } else {
                //         header("Location: index.php");
                //     }
                //     break;
           
                    case 'cart':
                        // Xử lý thêm vào giỏ hàng
                        if (isset($_POST['add_to_cart'])) {
                            $id = $_POST['id'];
                            $name = $_POST['name'];
                            $price = $_POST['price'];
                            $img = $_POST['img'];
                            $quantity = $_POST['quantity'];
                            $thanhtien = (int)$quantity*(int)$price;
                            $id_pro = $_POST['id_pro'];
                        
                            $allsanpham = addToCart($id, $name, $price, $img, $quantity,$id_pro,$thanhtien);
                            header("Location: index.php?pg=sanpham");
                            exit();
                        }
                        
                        // Xử lý mua hàng
                        if (isset($_POST['buy'])) {
                            $id = $_POST['id'];
                            $name = $_POST['name'];
                            $price = $_POST['price'];
                            $img = $_POST['img'];
                            $quantity = $_POST['quantity'];
                            $id_pro = $_POST['id_pro'];
                            $thanhtien = (int)$quantity*(int)$price;
                           $allsanpham = addToCart($id, $name, $price, $img, $quantity,$id_pro,$thanhtien);
                            
                            // Chuyển hướng đến trang giỏ hàng
                            header("Location: index.php?pg=cart");
                            exit();
                        }
                        
                        // Xử lý giảm số lượng sản phẩm trong giỏ hàng
                        if (isset($_GET['action']) && $_GET['action'] === 'giam' && isset($_GET['id'])) {
                            $id = $_GET['id'];
                            giamSoluong($id);
                        }
                        
                        // Xử lý cập nhật số lượng sản phẩm trong giỏ hàng
                        if (isset($_GET['action']) && $_GET['action'] === 'update_quantity' && isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $quantity = $_POST['quantity'];
                            updateSoluong($id, $quantity);
                            
                            // Tính tổng
                            $totalTong = getTotal();
                        }
                        
                        // Xử lý xóa sản phẩm khỏi giỏ hàng
                        if (isset($_GET['delete']) && $_GET['delete'] === 'remove' && isset($_GET['id'])) {
                            $id = $_GET['id'];
                            removeFromCart($id);
                        }
                        
                        // Kiểm tra nếu người dùng đã nhấp vào nút "Mua" và có sản phẩm trong giỏ hàng
                        if (isset($_POST['buy']) && isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                            // Chuyển hướng đến trang giỏ hàng
                            header("Location: index.php?pg=cart");
                            exit();
                        }
                        
                        include '../view/cart.php';
                        break;
//donhang             
                case 'donhang':
                    if (isset($_POST['guiyeucau'])) {
                    // Lấy dữ liệu từ biểu mẫu
                    $hoten = $_POST['hoten'];
                    $diachi = $_POST['diachi'];
                    $email = $_POST['email'];
                    $dienthoai = $_POST['dienthoai'];
                    $pttt = $_POST['pttt'];
                    
                    // Insert user mới
                    $username = "guest" . rand(1, 999);
                    $password = "123456";
                    $id_user = user_insert_id($username, $password, $hoten, $diachi, $email, $dienthoai);
                    
                    // Tạo đơn hàng và lưu vào cơ sở dữ liệu
                    $madh = "TCFH" . $id_user . "-" . date("His-dmY");
                    $total = getTotal();
                    $id_bill = bill_insert_id($madh, $id_user, $hoten, $email, $dienthoai, $diachi, $total, $pttt);
                    
                    // Insert giỏ hàng từ session cart
                    foreach ($_SESSION['cart'] as $allsanpham) {
                        extract($allsanpham);
                        // Kiểm tra và đảm bảo các biến có giá trị hợp lệ
                        if (!empty($id_pro) && !empty($soluong) && !empty($thanhtien)) {
                        cart_insert($id_pro, $price, $name, $img, $soluong, $thanhtien, $id_bill);
                        }
                    }
                    unset($_SESSION['cart']);
                    include '../view/thongbao.php';
                    }
                    
                    include '../view/donhang.php';
                    break;
                 
 //tim kiếm                         
            case 'timkiem':
                if (isset($_GET['timkiem'])) {
                    $keyword = $_GET['timkiem'];
                
                    // Gọi hàm getAllsanpham với từ khóa tìm kiếm
                    $results = getAllsanphamtimkiem(0, $keyword);
                
                    // Xử lý kết quả tìm kiếm
                    if (count($results) > 0) {
                        foreach ($results as $allsanpham) {
                            echo '<div>' . $allsanpham['name'] . '</div>'; // Thay đổi để hiển thị thông tin sản phẩm theo yêu cầu
                        }
                    } else {
                        echo 'Không tìm thấy kết quả phù hợp.';
                    }
                } else {
                    echo 'Thiếu từ khóa tìm kiếm.';
                }
            break; 
           
            default:
                # code...            
                include '../view/header.php';     
                include '../view/home.php';  
                include '../view/footer.php';
                break;
        }
    }else{
        $catId = isset($_GET['catId']) ? (int)$_GET['catId'] : 0 ;
        $sanpham = getSanpham($catId);
       
        include '../view/header.php';     
        include '../view/home.php';  
        include '../view/footer.php';
       
       

    }
?>

