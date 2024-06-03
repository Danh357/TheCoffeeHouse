<style>
    .content {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    h2 {
        color: #333;
        margin-bottom: 20px;
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
        background-color: #f2f2f2;
    }

    tbody tr:hover {
        background-color: #f9f9f9;
    }

    button {
        padding: 5px 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }
</style>

<div class="content">
    <h2>Quản Lí Đơn Hàng</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ngày đặt hàng</th>
                <th>Tên khách hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>2023-10-15</td>
                <td>Nguyễn Văn A</td>
                <td>500,000 VNĐ</td>
                <td>Chưa xử lý</td>
                <td>
                    <button>Xem chi tiết</button>
                    <button>Xóa</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>2023-11-01</td>
                <td>Trần Thị B</td>
                <td>1,200,000 VNĐ</td>
                <td>Đã giao hàng</td>
                <td>
                    <button>Xem chi tiết</button>
                    <button>Xóa</button>
                </td>
            </tr>
            <!-- Thêm các hàng dữ liệu khác tùy ý -->
        </tbody>
    </table>
</div>