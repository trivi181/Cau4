<?php
    session_start();
    include('config.php');
    if(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $matkhau = md5($_POST['password']);
        $sql="SELECT * FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1  ";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        //kiem tra thong tin dang nhap co dung khong
        if($count>0){
            $row_data= mysqli_fetch_array($row);
            $_SESSION['dangky']=$row_data['tenkhachhang'];
            $_SESSION['email']=$row_data['email'];
            $_SESSION['id_khachhang']=$row_data['id_dangky'];
            header("Location:menu/todolist.php");
            exit();
        }else{
            echo '<p style="color:red" >Email hoặc mật khẩu không chính xác </p>';
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập thành viên</title>
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
    .login-container {
        width: 300px;
        background-color: pink;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0px 0px 5px 5px black;
    }
    .login-container h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    .login-container input[type="text"],
    .login-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    .login-container input[type="submit"] {
        width: 100%;
        background-color: black;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .login-container input[type="submit"]:hover {
        background-color: #ffc001;
        color:black;
    }
    </style>
    </head>
    <body>

    <div class="login-container">

    <h2>Đăng nhập</h2>
    <form action="" method="POST">
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="password" placehoLder="Mật Khẩu" required>
        <input type="submit" name="dangnhap" value="DÔ">
    </form>
    </div>

    </body>
    </html>