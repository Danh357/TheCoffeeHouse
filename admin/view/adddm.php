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
  <h2>Thêm Danh Mục Mới</h2>

  <form action="index.php?pg=themdm" method="post" enctype="multipart/form-data">
      <div class="form-group">
          <label for="product-name">Tên Danh Mục:</label>
          <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
          <button type="submit" name="themdanhmuc">Thêm Danh Mục</button>
      </div>
  </form>

  
</div>