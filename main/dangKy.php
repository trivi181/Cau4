<?php
    session_start();
    include('config.php');
    //dung POST de push du lieu len database
     if(isset($_POST['dangky'])){
        $tenkhachhang = $_POST['hovaten'];
        $email = $_POST['email'];
        $matkhau = md5($_POST['matkhau']);
       $sql_dangky=mysqli_query($mysqli,"INSERT INTO tbl_dangky(email,matkhau,tenkhachhang) VALUE('".$email."','".$matkhau."','".$tenkhachhang."')");
       //kiem tra lenh SQL dang ky nguoi dung co thanh cong hay khong
       if($sql_dangky){
            echo'<p style="color:green">Bạn đã đăng ký thành công</p>';        
            $_SESSION['email']=$email;
            $_SESSION['dangky']=$tenkhachhang;
            $_SESSION['id_khachhang']=mysqli_insert_id($mysqli);
            header('Location:dangNhap.php');
        }
    }
?>
<!-- form dang ky -->
<style>

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding:0;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    container{
        text-align: center;
    }
    form table {
        width: 40%;
        border-collapse: collapse;
    }

    form table tr td {
        padding: 10px;
    }

    form table tr td:first-child {
        text-align: right;
        font-weight: bold;
        width: 30%;
    }

    form table tr td input[type="text"],
    form table tr td input[type="password"],
    form table tr td input[type="submit"] {
        width: 200px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        text-align: center;
        font-size: 14px;
    }

    form table tr td input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    form table tr td input[type="submit"]:hover {
        background-color: #0056b3;
    }

    form table tr td a {
        text-decoration: none;
        color: #007bff;
        transition: color 0.3s ease;
    }

    form table tr td a:hover {
        color: #0056b3;
    }

    p.message {
        color: green;
        font-weight: bold;
        text-align: center;
    }
</style>
<div class="container">
    <h2>Đăng ký</h2>
    <form action="" method="POST">
        <table border="1" width="50%" style="border-collapse:collapse";>
            <tr>
                <td>Email</td>
                <td><input type="text" name ="email"></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="text" name ="matkhau"></td>
            </tr>
            <tr>
            <tr>
                <td>Họ và tên</td>
                <td><input type="text" name ="hovaten"></td>
            </tr>
                <td><input type="submit"  name ="dangky" value="Đăng ký"></td>
                <td><a href="dangNhap.php">Đăng nhập</a></td>
            </tr>
        </table>
    </form>
</div>