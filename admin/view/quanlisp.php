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

.container {
display: flex;
}

.sidebar {
background-color: #f1f1f1;
width: 200px;
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
/* Quản Lí Khách Hàng */
.content {
    height: 100%;
padding: 20px;
}
.content img{
   height: 100px;
}
.content button{
    padding: 4px;
    display: inline;
    
}
.content button:focus{
    outline: none;
}
.content button:hover{
    background-color: #BD9F81;
   border: 1px solid #121212;

}
.content button a{
    color: #121212;
    text-decoration: none;
}
.content .btn a{
    color: #fff;
    font-size: 14px;
}

.content .btn{
    border: 1px solid #BD9F81;
    background-color: #BD9F81;
    padding: 15px;
    border-radius: 4px;
    transition: 0.9s;
}
.content .btn:hover{
    border: 1px solid #121212;
    background-color: #121212;
}
table {
width: 100%;
border-collapse: collapse;
}

th, td {
padding: 10px;
text-align: left;
border-bottom: 1px solid #ddd;
}

th {
background-color: #333;
color: #fff;
}

tbody tr:hover {
background-color: #f5f5f5;
}

.action-buttons button {
margin-right: 5px;
padding: 5px 10px;
background-color: #333;
color: #fff;
border: none;
cursor: pointer;
}

.action-buttons button:hover {
background-color: #555;
}
.phanpage {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-bottom: 10px;
}
.phanpage a {
    padding: 5px;
    text-decoration: none;
    margin: 4px;
    border: none;
    transition: 0.;
    background-color: #BD9F81;
    color: #fff;
}
.phanpage :hover{
    background-color: #121212;
    transform: scale(1.1);
}
/* Quản Lí Khách Hàng */


</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="content">   
        
    <button class="btn"><a href="index.php?pg=addsp">Thêm sản phẩm</a></button>
    <h2>Quản Lý Sản Phẩm</h2>

         <div class="phanpage">
         <a href="index.php?pg=quanlisp&page=all">Tất cả</a>
         <a href="index.php?pg=quanlisp&page=1">1</a>
         <a href="index.php?pg=quanlisp&page=2">2</a>
         <a href="index.php?pg=quanlisp&page=3">3</a>
         <a href="index.php?pg=quanlisp&page=4">4</a>
         <a href="index.php?pg=quanlisp&page=5">5</a>
         <a href="index.php?pg=quanlisp&page=6">6</a>
        </div>
     <!-- Danh sách sản phẩm -->
    <table>
        <thead>
            <tr>
                <th>ID_sp</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Sale</th>
                <th>Mô Tả</th>
                <th>Lượt xem</th>
                <th>Tồn kho</th>
                <th>Thao tác</th>
                
            </tr>
        </thead>
        <tbody>
        <?php 
                 if(isset($allsanpham) && count($allsanpham) >0) {
                    foreach($allsanpham as $allsanphams){
                        ?>                      
            <tr>
                <td><?=$allsanphams['id']?></td>
                <td><?=$allsanphams['name']?></td>
                <td><img src="../upload/<?=$allsanphams['img']?>" alt=""></td>

                <td><?=$allsanphams['id_dm']?></td>

                <td><?=$allsanphams['price']?>$</td>
                <td>0%</td>
                <td><?=$allsanphams['mota']?></td>
                <td><?=$allsanphams['view']?></td>
                <td>50</td>
                
                <td>            
                     <button><a  href="<?='index.php?pg=fixsp&id='.$allsanphams['id']?>"><i class="fa-solid fa-trash"></i></a></button>
                     <br><br>
                    <button><a  href="<?='index.php?pg=deletesp&id='.$allsanphams['id']?>"><i class="fa-solid fa-pen"></i></a></button>
                </td>
            </tr>

            <?php
                    }
                  } 
                  else {
                    echo 'Chưa có sản phẩm nào!';
                }             
                ?>
            </table>
        </tbody>
        <div class="phanpage">
        <a href="index.php?pg=quanlisp&page=all">Tất cả</a>
         <a href="index.php?pg=quanlisp&page=1">1</a>
         <a href="index.php?pg=quanlisp&page=2">2</a>
         <a href="index.php?pg=quanlisp&page=3">3</a>
         <a href="index.php?pg=quanlisp&page=4">4</a>
         <a href="index.php?pg=quanlisp&page=5">5</a>
         <a href="index.php?pg=quanlisp&page=6">6</a>
        </div>
    <br>
    <br>
    </div>
    <!-- Danh mục   Danh mục   Danh mục  Danh mục -->
    <!-- Danh sách sản phẩm liên quan -->
    <!-- <button class="btn"><a href="index.php?pg=addsplq">Thêm sản phẩm liên quan</a></button>
            <h2>Quản Lý Sản Phẩm Liên Quan</h2>
    <table>
        <thead>
            <tr>
                <th>ID_sp</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Sale</th>
                <th>Mô Tả</th>
                <th>Lượt xem</th>
                <th>Tồn kho</th>
                <th>Thao tác</th>
                
            </tr>
        </thead>
        <tbody>
        <?php 
                 if(isset($sanphamlienquan) && count($sanphamlienquan) >0) {
                    foreach($sanphamlienquan as $sanphamlienquans){
                        ?>                      
            <tr>
                <td><?=$sanphamlienquans['id']?></td>
                <td><?=$sanphamlienquans['name']?></td>
                <td><img src="../upload/<?=$sanphamlienquans['img']?>" alt=""></td>

                <td><?=$sanphamlienquans['id_dm']?></td>

                <td><?=$sanphamlienquans['price']?>$</td>
                <td>0%</td>
                <td><?=$sanphamlienquans['mota']?></td>
                <td><?=$sanphamlienquans['view']?></td>
                <td>50</td>
                
                <td>            
                     <button><a  href="<?='index.php?pg=fixsplq&id='.$sanphamlienquans['id']?>">Sửa</a></button>
                     <br><br>
                    <button><a  href="<?='index.php?pg=deletesplq&id='.$sanphamlienquans['id']?>">Xóa</a></button>
                </td>
            </tr>

            <?php
                    }
                  } 
                  else {
                    echo 'Chưa có sản phẩm nào!';
                }             
                ?>
            </table>
        </tbody>
    <br> -->
   