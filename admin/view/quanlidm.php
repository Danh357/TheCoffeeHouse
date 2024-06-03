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
    border: 1px solid #000;
}
.content button:hover{
    border: 1px solid #000;
    background-color: #BD9F81;
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
/* Quản Lí Khách Hàng */


</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="content">
<button class="btn"><a href="index.php?pg=adddm">Thêm danh mục</a></button> 
        <h2>Quản Lý Danh Mục</h2>
    <table>
        <thead>
            <tr>
                <th>ID_dm</th>
                <th>Tên danh mục</th>
                <th></th>
                <th>Thao tác</th>
               
                
            </tr>
        </thead>
     <tbody>
             <?php 
                 if(isset($danhmuc) && count($danhmuc) >0){
                    foreach($danhmuc as $danhmucs){
                        ?>
            <tr>
                <td><?=$danhmucs['id']?></td>
                <td><?=$danhmucs['name']?></td>
                <td>
                <td>            
                     <button><a  href="<?='index.php?pg=fixdm&id='.$danhmucs['id']?>"><i class="fa-solid fa-trash"></i></a></button>
                    <button><a  href="<?='index.php?pg=deletedm&id='.$danhmucs['id']?>"><i class="fa-solid fa-pen"></i></a></button>
                </td>
             </tr>

            <?php
            }
            }              
        ?>       
       
     </tbody>     
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    </div>