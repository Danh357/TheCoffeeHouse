<style>
  body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
  }

  .content {
      width: 50%;
      margin: 0 auto;
      padding: 20px;
  }

  h2 {
      text-align: center;
      margin-bottom: 20px;
  }

  .form-group {
      margin-bottom: 20px;
  }

  .form-group label {
      display: block;
      margin-bottom: 5px;
  }

  .form-group input[type="text"],
  .form-group textarea {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
  }

  .form-group select {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
  }

  .form-group button {
      padding: 10px 20px;
      background-color: #333;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
  }

  .form-group button:hover {
      background-color: #555;
  }
</style>
<div class="content">
  <h2>Thêm Sản Phẩm Liên Quan Mới</h2>

  <form action="index.php?pg=themsplq" method="post" enctype="multipart/form-data">
      <div class="form-group">
          <label for="product-name">Tên sản phẩm:</label>
          <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
          <label for="category">Danh mục:</label>
         
                         
          <select id="category" name="id_dm" required>
          <option value="">Chọn danh mục</option>
          <?php 
                 if(isset($danhmuc) && count($danhmuc) >0){
                    foreach($danhmuc as $danhmucs){
                        ?>
           
                     <option value="<?=$danhmucs['id']?>"><?=$danhmucs['name']?></option>
              
              <?php
                    }
                  }              
                ?>        
          </select>
      </div>
      <div class="form-group">
          <label for="price">Giá:</label>
          <input type="text" id="price" name="price" required>
      </div>
      <div class="form-group">
        <label  for="image">Hình ảnh:</label>
        <input type="file" id="img" name="img" accept="image/*">
        <label class="upload-button" for="image">Chọn file</label>
        <span class="file-name"></span>
    </div>
      <div class="form-group">
          <label for="description">Mô tả:</label>
          <textarea id="mota" name="mota" rows="4"></textarea>
      </div>
      <div class="form-group">
          <button type="submit" name="themsanpham">Thêm Sản Phẩm</button>
      </div>
  </form>

  
</div>