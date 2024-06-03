<style>
     /* Quản Lí Khách Hàng */
     .content {
            flex: 1;
            padding: 20px;
        }
        .content {
        padding: 20px;
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
<div class="content">
    <h2>Quản lí Tài Khoản</h2>
   <!-- Quản lí Khách Hàng -->
    <table>
      <thead>
          <tr>
              <th>ID</th>
              <th>Tên</th>
              <th>Số điện thoại</th>
              <th>Địa chỉ</th>
              <th>Email</th>
              <th>Thao tác</th>
          </tr>
      </thead>
      <tbody>
      <?php if ($userInfo): ?>
    <?php foreach ($userInfo as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><?= $user['dienthoai'] ?></td>
            <td><?= $user['diachi'] ?></td>
            <td><?= $user['email'] ?></td>
            <td>
                <button>Khóa</button>
                <button>Mở khóa</button>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="6">Không có tài khoản nào.</td>
    </tr>
<?php endif; ?>
         
          <!-- Thêm các hàng dữ liệu khác tùy ý -->
      </tbody>
  </table>
</div>