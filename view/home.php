<div class="container2">
    <div class="enlow">
        <h2>CHÀO MỪNG BẠN</h2>
        <img src="../image/enlow.png" alt="">
        <h6>Hãy thưởng thức mỗi giọt cà phê và cảm nhận hương vị của cuộc sống</h6>
     </div>   
        <div class="el-wrapper">
            <div class="el-custom">
                <img src="../image/h2-custom-icon-5.png" alt="">
                <span>COFFEE</span>
                <p>Một ngày tốt đẹp bắt đầu bằng một tách cà phê ngon</p>
            </div>
            <div class="el-custom">
                <img src="../image/h2-custom-icon-6.png" alt="">
                <span>HẠT COFFEE</span>
                <p>Cà phê là một cuộc phiêu lưu đầy mê hoặc trong từng hũu cơ.</p>
            </div>
            <div class="el-custom">
                <img src="../image/h2-custom-icon-7.png" alt="">
                <span>BÁNH NGỌT</span>
                <p>Khám phá thế giới bánh ngọt và cà phê tại đây, nơi mà hương vị và niềm vui giao nhau</p>
            </div>
            <div class="el-custom">
                <img src="../image/h2-custom-icon-8.png" alt="">
                <span>COFFEE ONLINE</span>
                <p>Cà phê online - trải nghiệm tuyệt vời của hương vị và tiện lợi</p>
            </div>
        </div>  
<!-- backgroud -->
        <div class="bg-enlow-coffee">
          <img src="../image/backgroud-enlow.jpg" alt="">
         <div class="enlow-coffee">
            <h2>THƯ VIỆN CÀ PHÊ</h2>
            <img src="../image/enlow.png" alt="">
            <h6>Khám phá không gian cà phê qua những bức hình đẹp, từ những góc chụp tinh tế đến sự phối màu tươi sáng, tạo nên một không gian thú vị và ấm cúng</h6>
         </div>   
        </div>

        <div class="ct-wrapper">
         <div class="enlow-content">
            <img src="../image/blog-1-img-2.jpg" alt="">
            <span>Phát Triển</span>
            <p>Uống cà phê không chỉ là thưởng thức hương vị, mà còn là cơ hội để tạo dựng mối quan hệ và kết nối với đồng nghiệp và bạn bè</p>
         </div>
         <div class="enlow-content">
            <img src="../image/blog-1-img-1.jpg" alt="">
            <span>Pha Chế</span>
            <p>Mỗi tách cà phê đều là một tác phẩm nghệ thuật, từ quá trình chế biến đến việc tạo ra hương vị tuyệt vời</p>
         </div>
         <div class="enlow-content">
            <img src="../image/blog-1-img-3.jpg" alt="">
            <span>Nghệ Thuật</span>
            <p>Cà phê và bạn bè - một sự kết hợp hoàn hảo để thư giãn, chia sẻ và tạo ra những kỷ niệm đáng nhớ</p>
         </div>
        </div>
    </div>
    <div class="container3">
        <div class="banner4">
        <img src="../image/banner4.jpg" alt="">
    </div>
    <div class="el-wrapper">
    <div class="el-custom">
        <h1>250</h1>
        <span>Loại COFFEE</span>
        <p>Khám phá đa dạng của hương vị cà phê từ những loại khác nhau.</p>
    </div>
    <div class="el-custom">
        <h1>123</h1>
        <span>Giờ thử nghiệm</span>
        <p>Trải nghiệm những giờ phút thú vị khi thử những cách pha cà phê mới.</p>
    </div>
    <div class="el-custom">
        <h1>321</h1>
        <span>Thị trường COFFEE</span>
        <p>Đắm mình trong thế giới sôi động của thị trường cà phê đầy cạnh tranh.</p>
    </div>
    <div class="el-custom">
        <h1>220</h1>
        <span>Nhãn hiệu COFFEE</span>
        <p>Khám phá những nhãn hiệu cà phê đẳng cấp và độc đáo.</p>
    </div>
</div>
    <div class="bg-enlow-coffee">
        <img src="../image/backgroud-enlow.jpg" alt="">
       <div class="enlow-coffee">
          <h2>CỬA HÀNG CÀ PHÊ ONLINE</h2>
          <img src="../image/enlow.png" alt="">
          <h6>Cà phê tươi ngon, dịch vụ tận tâm - Trải nghiệm tuyệt vời từ cửa hàng cà phê trực tuyến của chúng tôi</h6>
       </div>    
      </div>
      <!-- //sanpham -->
      <div class="bg-product-home">
             <?php 
                 if(isset($sanpham) && count($sanpham) >0){
                    foreach($sanpham as $sanphams){
                        ?>             

                         <div class="product-home">                                    
                         <form action="index.php?pg=cart" method="POST">     
                            <a href="<?='index.php?pg=sanphamchitiet&id='.$sanphams['id']?>"><img src="<?=$sanphams['img']?>" alt=""></a>
                             <p href="#"><?=$sanphams['name']?></p>
                             <a><?=$sanphams['price']?>$</a>
                            <input type="hidden" name="id" value="<?=$sanphams['id']?>">
                            <input type="hidden" name="name" value="<?=$sanphams['name']?>">
                            <input type="hidden" name="price" value="<?=$sanphams['price']?>">
                            <input type="hidden" name="img" value="<?=$sanphams['img']?>">
                            <input type="number" name="quantity" value="1" min="1">
                             <button class="add-to-cart" type="submit" name="buy">Mua Hàng</button>    
                             <a class="icons" href=""><i class="fa-regular fa-heart"></i></a>
                           </div>
                           </form>   
                         <?php
                    }
                  } 
                  else {
                    echo 'Chưa có sản phẩm nào!';

                }             
                ?>
              
    </div>
</div>
    <div class="container4">
        <div class="enlow">
            <h2>BỘ SƯU TẬP</h2>
            <img src="../image/enlow.png" alt="">
            <h6>Mang nghệ thuật vào cuộc sống bằng những cốc coffee tuyệt vời</h6>
         </div>   
         <div class="list-profile">
            <div>
                <img src="../image/anh1.jpg" alt="">
            </div>
            <div>
                <img src="../image/anh2.jpg" alt="">
            </div>
            <div>
                <img src="../image/anh3.jpg" alt="">
            </div>
            <div>
                <img src="../image/anh4.jpg" alt="">
            </div>
            <div>
                <img src="../image/anh5.jpg" alt="">
            </div>
            <div>
                <img src="../image/anh6.jpg" alt="">
            </div>
            <div>
                <img src="../image/anh7.jpg" alt="">
            </div>
            <div>
                <img src="../image/anh8.jpg" alt="">
            </div>
         </div>
         <div class="logo-icons">
         <div class="icons-hover">
            <img src="../image/clients-img-1.png" alt="">
         </div>
         <div class="icons-hover">
            <img src="../image/clients-img-2-hover.png" alt="">
         </div>
         <div class="icons-hover">
            <img src="../image/clients-img-3-hover.png" alt="">
         </div>
         <div class="icons-hover">
            <img src="../image/clients-img-4-hover.png" alt="">
         </div>
         <div class="icons-hover">
            <img src="../image/clients-img-5-hover.png" alt="">
         </div>
         <div class="icons-hover">
            <img src="../image/clients-img-6-hover.png" alt="">
         </div>
        </div>
    </div>
    <div class="container5">
        <div class="bg-contact">
            <img src="../image/backgroud-enlow.jpg" alt="">
        </div>
            <div class="contact-button">
                <p>HÃY LIÊN HỆ VỚI CHÚNG TÔI   </p>
                <button><a href="../view/contact.php">LIÊN HỆ </a></button>
            </div>   
        </div>