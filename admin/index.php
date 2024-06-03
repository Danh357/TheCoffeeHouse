<?php 
session_start();
    include '../model/global.php';
    include '../model/connectdb.php';
    include '../model/function.php';
    include 'view/header-admin.php';
 ?>
<?php 
    if(isset($_GET['pg'])){
            $pg=$_GET['pg'];
        switch ($_GET['pg']){
            case 'thongke':
                include '../admin/view/thongke.php';
                  break;    
//san pham 
            case 'quanlisp':
                if(!isset($_GET['page'])){
                    $page = 1;
                }else{
                   $page= $_GET['page'];
                }
                $soluongsp = 8;
                $all=0;
                $allsanpham= getAllSPadmin_new($page,$soluongsp);
            
                // $sanphamlienquan = getSanphamlq();
              include '../admin/view/quanlisp.php';
                break;
//danh mục
            case 'quanlidm':
               
                $danhmuc = getDanhmuc();  
                // $sanphamlienquan = getSanphamlq();
            include '../admin/view/quanlidm.php';
                break;
//san pham              
            case 'addsp':                  
                $danhmuc = getDanhmuc();  
                include '../admin/view/addsp.php';           
                    break;

            case 'themsp':
                if (isset($_POST['themsanpham'])) {
                    // Lấy thông tin sản phẩm từ form
                    $name = $_POST['name'];
                    $id_dm = $_POST['id_dm'];
                    $id = $_POST['id'];
                    $price = $_POST['price'];
                    $img = $_FILES['img']['name']; // Lấy tên tệp hình ảnh
                    $mota = $_POST['mota'];
                  
                    sanpham_insert($id,$name,$img,$price,$mota,$id_dm);
                    //upload hình 
                    $target_file=IMG_PATH_ADMIN.$img;
                    move_uploaded_file($_FILES["img"]["tmp_name"],$target_file);

                    header("Location: index.php?pg=thanhcongsp");

                    $allsanpham = getAllSPadmin_new($page,$soluongsp);
                    include '../admin/view/quanlisp.php';
                }else{
                    $danhmuc = getDanhmuc(); 
                    include '../admin/view/addsp.php';
                }
                 
                    break;
            case 'thanhcongsp':
                include '../admin/view/thanhcongsp.php';
                    break;
                //xóa sanpham
            case 'deletesp':
                if(isset($_GET['id'])&&($_GET['id']>0));{
                    $id=$_GET['id'];
                  deletesp($id);
                    header("Location: index.php?pg=quanlisp");
                }
                $allsanpham =getAllSPadmin_new($page,$soluongsp);
                include '../admin/view/quanlisp.php';
                    break;

            case 'fixsp':
                // Kiểm tra xem trang này được truy cập từ phương thức POST hay GET
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Kiểm tra xem có nút "Cập nhật" được nhấn hay không
                    if (isset($_POST['capnhat']) && !empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['mota'])) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $mota = $_POST['mota'];
                        $id_dm = $_POST['id_dm'];
                      
                        

                        // Kiểm tra xem có hình ảnh mới được tải lên hay không  
                        if (!empty($_FILES['img']['name'])) {
                            $img = uploadImage($_FILES['img']);
                        } else {
                            // Nếu không có hình ảnh mới, giữ nguyên hình ảnh cũ
                            $sanpham = getoneSanpham($id);
                            $img = $sanpham['img'];
                        }

                        // Cập nhật thông tin sản phẩm
                        fixSanpham($id, $name, $img, $price, $mota, $id_dm);

                        // Thông báo thành công
                        header('Location: index.php?pg=thanhcongfixsp');
                        exit();
                    } else {
                        echo 'Lỗi: Thiếu thông tin sản phẩm';
                    }
                } else {
                    // Kiểm tra xem có truyền ID sản phẩm cần sửa qua tham số GET hay không
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $fixsanpham = getoneSanpham($id);
                        $danhmuc = getDanhmuc();
                        include '../admin/view/fixsp.php';
                    }  
                    
                }
                break;

            case 'thanhcongfixsp':
                include '../admin/view/thanhcongfixsp.php';
                break;
//sanphamlienquan
//             case 'addsplq':                  
//                 $danhmuc = getDanhmuc();  
//                 include '../admin/view/addsplq.php';           
//                     break;
//             case 'themsplq':
//                 if (isset($_POST['themsanpham'])) {
//                     // Lấy thông tin sản phẩm từ form
//                     $name = $_POST['name'];
//                     $id_dm = $_POST['id_dm'];
//                     $id = $_POST['id'];
//                     $price = $_POST['price'];
//                     $img = $_FILES['img']['name']; // Lấy tên tệp hình ảnh
//                     $mota = $_POST['mota'];
                
//                     sanphamlq_insert($id,$name,$img,$price,$mota, $id_dm);
//                     //upload hình 
//                     $target_file=IMG_PATH_ADMIN.$img;
//                     move_uploaded_file($_FILES["img"]["tmp_name"],$target_file);

//                     header("Location: index.php?pg=thanhcongsplq");

//                     $sanphamlienquan = getAllSPlqadmin_new();
//                     include '../admin/view/quanlisp.php';
//                 }else{
//                     $danhmuc = getDanhmuc(); 
//                     include '../admin/view/addsplq.php';
//                 }              
//                     break;
// //thongbaothanhcong
//                 case 'thanhcongsplq':
//                     include '../admin/view/thanhcongsplq.php';
//                         break;
// //xóa        
//                 case 'deletesplq':
//                     if(isset($_GET['id'])&&($_GET['id']>0));{
//                         $id=$_GET['id'];
//                         deletesplq($id);
//                         header("Location: index.php?pg=quanlisp");
//                     }
//                     $sanphamlienquan = getAllSPlqadmin_new();
//                     include '../admin/view/quanlisp.php';
//                         break;
//  //suwae sp liên quan                       
//                         case 'fixsplq':
//                             // Kiểm tra xem trang này được truy cập từ phương thức POST hay GET
//                             if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//                                 // Kiểm tra xem có nút "Cập nhật" được nhấn hay không
//                                 if (isset($_POST['capnhat']) && !empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['mota'])) {
//                                     $id = $_POST['id'];
//                                     $name = $_POST['name'];
//                                     $price = $_POST['price'];
//                                     $mota = $_POST['mota'];
//                                     $id_dm = $_POST['id_dm'];
                                  
                                    
            
//                                     // Kiểm tra xem có hình ảnh mới được tải lên hay không  
//                                     if (!empty($_FILES['img']['name'])) {
//                                         $img = uploadImagelq($_FILES['img']);
//                                     } else {
//                                         // Nếu không có hình ảnh mới, giữ nguyên hình ảnh cũ
//                                         $sanpham = getoneSanphamlq($id);
//                                         $img = $sanpham['img'];
//                                     }
            
//                                     // Cập nhật thông tin sản phẩm
//                                     fixSanphamlq($id, $name, $img, $price, $mota, $id_dm);
            
//                                     // Thông báo thành công
//                                     header('Location: index.php?pg=thanhcongfixsplq');
//                                     exit();
//                                 } else {
//                                     echo 'Lỗi: Thiếu thông tin sản phẩm';
//                                 }
//                             } else {
//                                 // Kiểm tra xem có truyền ID sản phẩm cần sửa qua tham số GET hay không
//                                 if (isset($_GET['id'])) {
//                                     $id = $_GET['id'];
//                                     $fixsanphamlq = getoneSanphamlq($id);
//                                     $danhmuc = getDanhmuc();
//                                     include '../admin/view/fixsplq.php';
//                                 }  
                                
//                             }
//                             break;
            
//                         case 'thanhcongfixsplq':
//                             include '../admin/view/thanhcongfixsplq.php';
//                             break;

//danhmuc
//danhmuc

            case 'adddm':
                include '../admin/view/adddm.php';
                    break;
            case 'themdm':
                if (isset($_POST['themdanhmuc'])) {
                    // Lấy thông tin sản phẩm từ form
                    $name = $_POST['name'];
                    $id = $_POST['id'];
                    danhmuc_insert($name,$id);
                    //upload hình 
                    $target_file=IMG_PATH_ADMIN.$img;
                    move_uploaded_file($_FILES["img"]["tmp_name"],$target_file);

                    header("Location: index.php?pg=thanhcongdm");

                    // $allsanpham = getAllSPadmin_new($page,$soluongsp);
                    include '../admin/view/quanlisp.php';
                }else{
                    $danhmuc = getDanhmuc(); 
                    include '../admin/view/addsp.php';
                }  
                    break;

            case 'thanhcongdm':
                include '../admin/view/thanhcongdm.php';
                    break;
 //xóa danhmuc
            case 'deletedm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $id=$_GET['id'];
                //      // Kiểm tra danh mục có sản phẩm hay không
                // $sanphamin = checksanphamindanhmuc($id);
                // if ($hasProducts) {
                //     echo "Danh mục có sản phẩm không thể xóa.";
                //     header("Location: index.php?pg=thongbaoxoadm");
                // } else {
                    deletedm($id);
                    header("Location: index.php?pg=quanlidm");
                // }
            }
                // $allsanpham = getAllSPadmin_new($page,$soluongsp);
                include '../admin/view/quanlisp.php';
                    break;
//sửa danhmuc                 
                case 'fixdm':
                    if (isset($_POST['capnhat']) && !empty($_POST['id']) && !empty($_POST['name'])) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        fixDanhmuc($id, $name);
                        
                        // Thực hiện hành động cập nhật danh mục, ví dụ: thông báo thành công
                        
                        header('Location: index.php?pg=thanhcongfixdm');
                        exit();
                        
                    } else {
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $fixdanhmuc = getOneDanhmuc($id);
                            
                            // Hiển thị form để sửa id và name của danh mục
                            include '../admin/view/fixdm.php';
                          
                        } else {
                           
                            // Xử lý khi không có giá trị 'id' trong URL, ví dụ: chuyển hướng hoặc thông báo lỗi
                        }
                    } 
                    break;
//thongbao
                    case 'thanhcongfixdm':
                        include '../admin/view/thanhcongfixdm.php';
                        break;

//user                        
                    case 'quanlitk':
                        $userInfo = getUserInfo();

                        if ($userInfo) {
                            include '../admin/view/quanlitk.php';
                        } else {
                            echo "Không có tài khoản nào.";
                        }
                        break;       
                    case 'quanlidh':
                        include '../admin/view/quanlidh.php';
                        break;         
            // case 'thanhtoan':                          
            //     if (isset($_POST['thanhtoan'])) {
            //     $username = $_POST['username'];
            //     $email = $_POST['email'];
            //     $dienthoai = $_POST['dienthoai'];
            //     $diachi = $_POST['diachi'];

            //     // Thực hiện lưu thông tin khách hàng vào cơ sở dữ liệu hoặc xử lý theo nhu cầu của bạn

            //     // Ví dụ: Thêm thông tin khách hàng vào bảng quản lí khách hàng
            //     $khachhang = [
            //         'username' => $username,
            //         'email' => $email,
            //         'dienthoai' => $dienthoai,
            //         'diachi' => $diachi
            //     ];
          
            //     // Thêm $khachhang vào cơ sở dữ liệu hoặc xử lý theo nhu cầu của bạn

            //     // Hiển thị bảng quản lí khách hàng
            // }
            //     include '../admin/view/quanlikh.php';
            //         break; 
            case 'dangxuat':
                unset($_SESSION['user']);
                header('location: /DA1/contronller/index.php?pg=dangnhap');
                    break;           
    
            default:
              include 'view/header-admin.php';
                break;
        }
    }else{

    }

?>