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
.form-group .danh{
   height: 90px;
}
.form-group img{
   height: 100px;
   
}
</style>
<div class="content">
<h2>Sửa Sản Phẩm Liên Quan</h2>

<form action="index.php?pg=fixsplq" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="product-name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($fixsanphamlq['name']) ?>">
        <input type="hidden" name="id" value="<?= htmlspecialchars($fixsanphamlq['id']) ?>">
    </div>
    <div class="form-group">
        <label for="category">Danh mục:</label>

        <select id="category" name="id_dm">
            <option value=""></option>
            <?php
            if (isset($danhmuc) && count($danhmuc) > 0) {
                foreach ($danhmuc as $danhmucs) {
                    $selected = ($danhmucs['id'] == $fixsanphamlq['id_dm']) ? 'selected' : '';
                    ?>
                    <option value="<?= htmlspecialchars($danhmucs['id']) ?>" <?= $selected ?>>
                        <?= htmlspecialchars($danhmucs['name']) ?>
                    </option>
                    <?php
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="text" id="price" name="price" value="<?= htmlspecialchars($fixsanphamlq['price']) ?>">
    </div>
    <div class="form-group">
        <label for="image">Hình ảnh cũ:</label>
        <td><img src="../upload/<?=$fixsanphamlq['img']?>" alt=""></td>
    </div>
    <div class="form-group">
        <label for="image">Hình ảnh:</label>
        <input type="file" id="img" name="img" accept="image/*" value="<?= htmlspecialchars($fixsanphamlq['img']) ?>">
        <span class="file-name"></span>
    </div>
    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="mota" name="mota" rows="4"><?= htmlspecialchars($fixsanphamlq['mota']) ?></textarea>
    </div>
    <div class="form-group">
        <button type="submit" name="capnhat">Cập Nhật</button>
    </div>
</form>
                
 
</div>