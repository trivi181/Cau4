<?php
session_start();
include('config.php');
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if(!isset($_SESSION['id_khachhang'])) {
    header("Location: index.php?quanly=dangnhap");
    exit();
}
// Lấy thông tin khách hàng từ cơ sở dữ liệu
$id_khachhang = $_SESSION['id_khachhang'];
$sql = "SELECT * FROM tbl_dangky WHERE id_dangky='$id_khachhang'";
$result = mysqli_query($mysqli, $sql);
$khachhang = mysqli_fetch_array($result);

if(isset($_POST['capnhat'])) {
    $tenkhachhang = $_POST['hovaten'];

    // Cập nhật thông tin khách hàng
    $sql_update = "UPDATE tbl_dangky SET tenkhachhang='$tenkhachhang' WHERE id_dangky='$id_khachhang'";
    
    if(mysqli_query($mysqli, $sql_update)) {
        echo '<p style="color:green">Cập nhật thông tin thành công!</p>';
    } else {
        echo '<p style="color:red">Cập nhật thông tin không thành công!</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sửa Thông Tin Khách Hàng</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .form-container {
        width: 400px;
        background-color: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-container h2 {
        text-align: center;
    }
    .form-container input[type="text"],
    .form-container input[type="email"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .form-container input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .form-container input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<div class="form-container">
    <h2>Sửa Thông Tin Khách Hàng</h2>
    <form action="" method="POST">
        <input type="text" name="hovaten" placeholder="Họ và tên" value="<?php echo $khachhang['tenkhachhang']; ?>" required>
    <input type="submit" name="capnhat" value="Cập nhật">
    <a href="thayDoiMK.php">Đổi mật khẩu</a>
    </form>
</div>

</body>
</html>