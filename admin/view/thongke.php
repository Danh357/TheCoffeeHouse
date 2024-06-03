<style>
    .content {
  display: flex;
  justify-content: space-between;
}

.table {
  width: 30%;
}

.table h2 {
  margin-bottom: 10px;
}

.table table {
  width: 100%;
  border-collapse: collapse;
}

.table th, .table td {
  padding: 8px;
  text-align: left;
  border: 1px solid #ccc;
}

.table th {
  background-color: #f2f2f2;
}

.table tbody tr:nth-child(even) {
  background-color: #f9f9f9;
}
</style>
<div class="content">
    <div class="table">
      <h2>Bảng thống kê doanh thu theo ngày</h2>
      <table>
        <thead>
          <tr>
            <th>Ngày</th>
            <th>Doanh thu</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Ngày 1</td>
            <td>$1000</td>
          </tr>
          <tr>
            <td>Ngày 2</td>
            <td>$1500</td>
          </tr>
          <!-- Thêm các hàng khác tương tự cho các ngày khác -->
        </tbody>
      </table>
    </div>
  
    <div class="table">
      <h2>Bảng thống kê doanh thu theo tháng</h2>
      <table>
        <thead>
          <tr>
            <th>Tháng</th>
            <th>Doanh thu</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tháng 1</td>
            <td>$5000</td>
          </tr>
          <tr>
            <td>Tháng 2</td>
            <td>$8000</td>
          </tr>
          <!-- Thêm các hàng khác tương tự cho các tháng khác -->
        </tbody>
      </table>
    </div>
  
    <div class="table">
      <h2>Bảng thống kê doanh thu theo năm</h2>
      <table>
        <thead>
          <tr>
            <th>Năm</th>
            <th>Doanh thu</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>2021</td>
            <td>$50000</td>
          </tr>
          <tr>
            <td>2022</td>
            <td>$80000</td>
          </tr>
          <!-- Thêm các hàng khác tương tự cho các năm khác -->
        </tbody>
      </table>
    </div>
  </div>